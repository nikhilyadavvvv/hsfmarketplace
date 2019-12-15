function loadProducts(){

    var url_string = window.location.href;
    var url = new URL(url_string);
    var id = url.searchParams.get("id");
    console.log(id);
    //////////// AJAX REQUEST TO GET DATA ////////////////////
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            var result = this.responseText;

            var results = JSON.parse(result);
            var products_div = document.createElement("div");
            results.forEach((product)=>
        {
            var id = product.id;
            var name = product.name;
            var cost = product.cost;
            var image = product.image;
            var category = product.category;
            var description = product.description;
            var stock = product.stock;
            var seller = product.seller;

            console.log('seller'+seller);
            document.getElementById('product_name').innerHTML= name;
            document.getElementById('product_price').innerHTML= '&#8364;'+cost;
            //document.getElementById('product_seller').innerHTML= seller;

            document.getElementById('toSeller').value= seller;

            document.getElementById('addToCart').value= id;

            document.getElementById('sendProductId').value= id;
            document.getElementById('addToWishlist').value= id;

            document.getElementById('product_info').innerHTML= description;
            document.getElementById('product_stock').innerHTML= stock;
            document.getElementById('product_description').innerHTML= description;
            document.getElementById('product_img_big').src= image;
            document.getElementById('product_img_small').src= image;
            loadImages(id);
        });

        }
    }

    xhttp.open("GET", "model/product_detail.php?id="+id, true);
    xhttp.send();
}


function loadImages(id){

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            var result = this.responseText;
            console.log(result);
            document.getElementById("small_images").innerHTML = result;
        }
    }
    console.log("model/get_multi_images.php?id="+id);
    xhttp.open("GET", "model/get_multi_images.php?id="+id, true);
    xhttp.send();
}

function sendMessage() {
    var to = document.getElementById("toSeller").value;
    var product_id =document.getElementById("sendProductId").value;
    var content =document.getElementById("content").value;
    console.log('sendmessage');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var response = this.responseText;
        console.log(response);
        alert(response);
      }
    };
    xhttp.open("POST", "model/message.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("content="+content+"&product_id="+product_id+"&to="+to);
}
