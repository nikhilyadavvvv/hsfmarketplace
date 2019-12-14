function loadCart(){
    //////////// AJAX REQUEST TO GET DATA ////////////////////
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            var result = this.responseText;
            document.getElementById('shp__cart__wrap').innerHTML = result;
            loadTotal();
        }
    }
    xhttp.open("GET", "model/get_basket.php", true);
    xhttp.send();
}

function loadTotal(){
    //////////// AJAX REQUEST TO GET DATA ////////////////////
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            var result = this.responseText;
            document.getElementById('shp__cart__wrap').innerHTML = result;
        }
    }
    xhttp.open("GET", "model/get_basket.php", true);
    xhttp.send();
}

function addToCart(id){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            var result = this.responseText;
            alert(result);
            loadCart();
        }
    }
    console.log("model/basket.php?product_id="+id);
    xhttp.open("GET", "model/basket.php?product_id="+id, true);
    xhttp.send();
}

function deleteFromCart(id){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            var result = this.responseText;
            //alert(result);
            loadCart();
        }
    }
    console.log("model/delete_basket_product.php?product_id="+id);
    xhttp.open("GET", "model/delete_basket_product.php?product_id="+id, true);
    xhttp.send();
}

function checkout(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            var result = this.responseText;
            alert(result);
            loadCart();
        }
    }
    xhttp.open("GET", "model/checkout_basket.php", true);
    xhttp.send();
}
