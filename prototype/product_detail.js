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

            var product_img = document.createElement('img');
            product_img.src =  image;
            product_img.height = 100;
            product_img.width = 100;

            var product_name = document.createElement('h3');
            product_name.textContent = name;

            var product_cost = document.createElement('h3');
            product_cost.textContent ='\u20AC'+cost;

            var product_category = document.createElement('h5');
            product_category.textContent = category;

            var product_description = document.createElement('h4');
            product_description.textContent =description;

            var product_stock = document.createElement('h6');
            product_stock.textContent ='only '+stock+' available';

            products_div.appendChild(product_img);
            products_div.appendChild(product_name);
            products_div.appendChild(product_cost);
            products_div.appendChild(product_category);
            products_div.appendChild(product_description);
            products_div.appendChild(product_stock);
           


            document.body.appendChild(products_div);
        });

        }
    }

    xhttp.open("GET", "product_detail.php?id="+id, true);
    xhttp.send();
}
