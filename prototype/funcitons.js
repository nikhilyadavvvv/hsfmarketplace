function loadProducts(){

    var products_div = document.createElement("div");
    var i = 0;
    //////////// AJAX REQUEST TO GET DATA ////////////////////
    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            var result = this.responseText;
            var results = JSON.parse(result);
            results.forEach((product)=>
        {
            i++;
            var id = product.id;
            var name = product.name;
            var cost = product.cost;
            var image = product.image;

            var product_img = document.createElement('img');
            product_img.src =  image;
            product_img.height = 100;
            product_img.width = 100;

            var product_name = document.createElement('h3');
            product_name.textContent = name;

            var product_cost = document.createElement('h4');
            product_cost.textContent ='\u20AC'+ cost;

            var product_link = document.createElement('a');
            product_link.href = 'product_detail.html?id='+id;
            product_link.textContent = 'details';

            var product_separator = document.createElement('hr');

            products_div.appendChild(product_img);
            products_div.appendChild(product_name);
            products_div.appendChild(product_cost);
            products_div.appendChild(product_link);
            products_div.appendChild(product_separator);

        });


        }
    }
    document.getElementById("products_container").innerHTML = '';
    document.getElementById("products_container").appendChild(products_div);

    xhttp.open("GET", "get_products.php", true);
    xhttp.send();
}


