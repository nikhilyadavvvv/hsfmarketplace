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
            document.getElementById('product_seller').innerHTML= seller;
            document.getElementById('product_info').innerHTML= description;
            document.getElementById('product_stock').innerHTML= stock;
            document.getElementById('product_description').innerHTML= description;
            document.getElementById('product_img_big').src= image;
            document.getElementById('product_img_small').src= image;

        });

        }
    }

    xhttp.open("GET", "model/product_detail.php?id="+id, true);
    xhttp.send();
}
