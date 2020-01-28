<?php
require 'config.php';
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->post('/login', 'login');
$app->post('/signup', 'signup');

$app->get('/search', 'search');
$app->get('/products', 'products');

$app->get('/getFeed', 'getFeed');
$app->post('/feed', 'feed');
$app->post('/feedUpdate', 'feedUpdate');
$app->post('/feedDelete', 'feedDelete');
$app->post('/getImages', 'getImages');


$app->get('/product-details(/:id)', function ($id = 0) {
    if ($id==0 || $id=='') {
        echo '{"error":{"text":"Request needs a id."}}';
    } else {
        try
        {

            $db = getDB();
            $productData = '';
            $sql = "SELECT * FROM table_product join multi_images on table_product.id=multi_images.id WHERE table_product.id=:id limit 1";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $mainCount = $stmt->rowCount();
            $productData = $stmt->fetch(PDO::FETCH_OBJ);

            $db = null;
            if ($productData)
            {
                $productData = json_encode($productData);
                echo '{"product": ' . $productData . '}';
            }
            else
            {
                echo '{"error":{"text":"Bad request wrong email and password"}}';
            }

        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }
    
});



$app->run();

/************************* USER LOGIN *************************************/
function login()
{

    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());

    try
    {

        $db = getDB();
        $userData = '';
        $sql = "SELECT * FROM user WHERE  email=:email and password=:password ";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("email", $data->email, PDO::PARAM_STR);
        $password = md5($data->password);
        $stmt->bindParam("password", $password, PDO::PARAM_STR);
        $stmt->execute();
        $mainCount = $stmt->rowCount();
        $userData = $stmt->fetch(PDO::FETCH_OBJ);

        if (!empty($userData))
        {
            $user_id = $userData->user_id;
            $userData->token = apiToken($user_id);
        }

        $db = null;
        if ($userData)
        {
            $userData = json_encode($userData);
            echo '{"userData": ' . $userData . '}';
        }
        else
        {
            echo '{"error":{"text":"Bad request wrong email and password"}}';
        }

    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
}

function search()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());

    try
    {
        $db = getDB();
        $productsData = '';

        $sql = "SELECT * FROM table_product WHERE name like :search or category like :search or description like :search";
        $stmt = $db->prepare($sql);
        //$stmt->bindParam("search", "%".$data->text."%", PDO::PARAM_STR);
        //$stmt->execute();
        $stmt->execute(array(':search' => '%'.$data->text.'%'));
        $mainCount = $stmt->rowCount();
        $productsData = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;
        if ($productsData)
        {
            $productsData = json_encode($productsData);
            echo $productsData;
        }
        else
        {
            echo '{"error":{"text":"Bad request wrong email and password"}}';
        }
    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
}

function products()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());

    try
    {
        $db = getDB();
        $productsData = '';

        $sql = "SELECT * FROM table_product";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $mainCount = $stmt->rowCount();
        $productsData = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;
        if ($productsData)
        {
            $productsData = json_encode($productsData);
            echo '{"products": ' . $productsData . '}';
        }
        else
        {
            echo '{"error":{"text":"Bad request wrong email and password"}}';
        }
    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
}

/* ### User registration ### */
function signup()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $email = $data->email;
    $name = $data->name;
    $username = $data->username;
    $password = $data->password;

    try
    {

        $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
        $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
        $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

        echo $email_check . '<br/>' . $email;

        if (strlen(trim($username)) > 0 && strlen(trim($password)) > 0 && strlen(trim($email)) > 0 && $email_check > 0 && $username_check > 0 && $password_check > 0)
        {
            echo 'here';
            $db = getDB();
            $userData = '';
            $sql = "SELECT user_id FROM users WHERE username=:username or email=:email";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("username", $username, PDO::PARAM_STR);
            $stmt->bindParam("email", $email, PDO::PARAM_STR);
            $stmt->execute();
            $mainCount = $stmt->rowCount();
            $created = time();
            if ($mainCount == 0)
            {

                /*Inserting user values*/
                $sql1 = "INSERT INTO users(username,password,email,name)VALUES(:username,:password,:email,:name)";
                $stmt1 = $db->prepare($sql1);
                $stmt1->bindParam("username", $username, PDO::PARAM_STR);
                $password = hash('sha256', $data->password);
                $stmt1->bindParam("password", $password, PDO::PARAM_STR);
                $stmt1->bindParam("email", $email, PDO::PARAM_STR);
                $stmt1->bindParam("name", $name, PDO::PARAM_STR);
                $stmt1->execute();

                $userData = internalUserDetails($email);

            }

            $db = null;

            if ($userData)
            {
                $userData = json_encode($userData);
                echo '{"userData": ' . $userData . '}';
            }
            else
            {
                echo '{"error":{"text":"Enter valid data"}}';
            }

        }
        else
        {
            echo '{"error":{"text":"Enter valid data"}}';
        }
    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
}

function email()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $email = $data->email;

    try
    {

        $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);

        if (strlen(trim($email)) > 0 && $email_check > 0)
        {
            $db = getDB();
            $userData = '';
            $sql = "SELECT user_id FROM emailUsers WHERE email=:email";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("email", $email, PDO::PARAM_STR);
            $stmt->execute();
            $mainCount = $stmt->rowCount();
            $created = time();
            if ($mainCount == 0)
            {

                /*Inserting user values*/
                $sql1 = "INSERT INTO emailUsers(email)VALUES(:email)";
                $stmt1 = $db->prepare($sql1);
                $stmt1->bindParam("email", $email, PDO::PARAM_STR);
                $stmt1->execute();

            }
            $userData = internalEmailDetails($email);
            $db = null;
            if ($userData)
            {
                $userData = json_encode($userData);
                echo '{"userData": ' . $userData . '}';
            }
            else
            {
                echo '{"error":{"text":"Enter valid dataaaa"}}';
            }
        }
        else
        {
            echo '{"error":{"text":"Enter valid data"}}';
        }
    }

    catch(PDOException $e)
    {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
}

/* ### internal Username Details ### */
function internalUserDetails($input)
{

    try
    {
        $db = getDB();
        $sql = "SELECT user_id, name, email, username FROM users WHERE username=:input or email=:input";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("input", $input, PDO::PARAM_STR);
        $stmt->execute();
        $usernameDetails = $stmt->fetch(PDO::FETCH_OBJ);
        $usernameDetails->token = apiToken($usernameDetails->user_id);
        $db = null;
        return $usernameDetails;

    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }

}

function getFeed()
{

    try
    {

        if (1)
        {
            $feedData = '';
            $db = getDB();

            $sql = "SELECT * FROM feed  ORDER BY feed_id DESC LIMIT 15";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindParam("lastCreated", $lastCreated, PDO::PARAM_STR);

            $stmt->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);

            $db = null;

            if ($feedData) echo '{"feedData": ' . json_encode($feedData) . '}';
            else echo '{"feedData": ""}';
        }
        else
        {
            echo '{"error":{"text":"No access"}}';
        }

    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }

}

function feed()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id = $data->user_id;
    $token = $data->token;
    $lastCreated = $data->lastCreated;
    $systemToken = apiToken($user_id);

    try
    {

        if ($systemToken == $token)
        {
            $feedData = '';
            $db = getDB();
            if ($lastCreated)
            {
                $sql = "SELECT * FROM feed WHERE user_id_fk=:user_id AND created < :lastCreated ORDER BY feed_id DESC LIMIT 5";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                $stmt->bindParam("lastCreated", $lastCreated, PDO::PARAM_STR);
            }
            else
            {
                $sql = "SELECT * FROM feed WHERE user_id_fk=:user_id ORDER BY feed_id DESC LIMIT 5";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            }
            $stmt->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);

            $db = null;

            if ($feedData) echo '{"feedData": ' . json_encode($feedData) . '}';
            else echo '{"feedData": ""}';
        }
        else
        {
            echo '{"error":{"text":"No access"}}';
        }

    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }

}

function feedUpdate()
{

    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id = $data->user_id;
    $token = $data->token;
    $feed = $data->feed;

    $systemToken = apiToken($user_id);

    try
    {

        if ($systemToken == $token)
        {

            $feedData = '';
            $db = getDB();
            $sql = "INSERT INTO feed ( feed, created, user_id_fk) VALUES (:feed,:created,:user_id)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("feed", $feed, PDO::PARAM_STR);
            $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $created = time();
            $stmt->bindParam("created", $created, PDO::PARAM_INT);
            $stmt->execute();

            $sql1 = "SELECT * FROM feed WHERE user_id_fk=:user_id ORDER BY feed_id DESC LIMIT 1";
            $stmt1 = $db->prepare($sql1);
            $stmt1->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt1->execute();
            $feedData = $stmt1->fetch(PDO::FETCH_OBJ);

            $db = null;
            echo '{"feedData": ' . json_encode($feedData) . '}';
        }
        else
        {
            echo '{"error":{"text":"No access"}}';
        }

    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }

}

function feedDelete()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id = $data->user_id;
    $token = $data->token;
    $feed_id = $data->feed_id;

    $systemToken = apiToken($user_id);

    try
    {

        if ($systemToken == $token)
        {
            $feedData = '';
            $db = getDB();
            $sql = "Delete FROM feed WHERE user_id_fk=:user_id AND feed_id=:feed_id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindParam("feed_id", $feed_id, PDO::PARAM_INT);
            $stmt->execute();

            $db = null;
            echo '{"success":{"text":"Feed deleted"}}';
        }
        else
        {
            echo '{"error":{"text":"No access"}}';
        }

    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }

}
$app->post('/userImage', 'userImage'); /* User Details */
function userImage()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id = $data->user_id;
    $token = $data->token;
    $imageB64 = $data->imageB64;
    $systemToken = apiToken($user_id);
    try
    {
        if (1)
        {
            $db = getDB();
            $sql = "INSERT INTO imagesData(b64,user_id_fk) VALUES(:b64,:user_id)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindParam("b64", $imageB64, PDO::PARAM_STR);
            $stmt->execute();
            $db = null;
            echo '{"success":{"status":"uploaded"}}';
        }
        else
        {
            echo '{"error":{"text":"No access"}}';
        }
    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
}

$app->post('/getImages', 'getImages');
function getImages()
{
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id = $data->user_id;
    $token = $data->token;

    $systemToken = apiToken($user_id);
    try
    {
        if (1)
        {
            $db = getDB();
            $sql = "SELECT b64 FROM imagesData";
            $stmt = $db->prepare($sql);

            $stmt->execute();
            $imageData = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            echo '{"imageData": ' . json_encode($imageData) . '}';
        }
        else
        {
            echo '{"error":{"text":"No access"}}';
        }
    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
}

?>
