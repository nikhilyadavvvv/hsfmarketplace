
<?php
    $filename  = $_FILES['uploadedfile']['tmp_name'];
    $handle    = fopen($filename, "r");
    $data      = fread($handle, filesize($filename));
    $POST_DATA = array(
      'image' => base64_encode($data)
    );
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=145ffb74f542dd121e504d6e5d699236');
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $POST_DATA);
    $response = curl_exec($curl);
    curl_close ($curl);
    $response = json_decode($response,true);
    print("<pre>".print_r($response,true)."</pre>");
    echo $url = $response['data']['url'];
?>