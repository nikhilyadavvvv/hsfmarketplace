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

function addToCart(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            var result = this.responseText;
            document.getElementById('shp__cart__wrap').innerHTML = result;
        }
    }
    xhttp.open("GET", "model/basket.php", true);
    xhttp.send();
}
