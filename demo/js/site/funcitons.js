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
            var html ='';
            results.forEach((product)=>
            {
                i++;
                var id = product.id;
                var name = product.name;
                var cost = product.cost;
                var image = product.image;

                var product_link = 'product_detail.php?id='+id;
                
                html += '<div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">';
                html += '<div class="category">';
                html += '<div class="ht__cat__thumb">';
                html += '<a href="'+product_link+'">';
                html += '<img src="'+image+'" alt="product images">';
                html += '</a>';
                html += '</div>';
                html += '<div class="fr__product__inner">';
                html += '<h4><a href="'+product_link+'">'+name+'</a></h4>';
                html += '<ul class="fr__pro__prize">';
                //html += '<li class="old__prize">$30.3</li>';
                html += '<li>&#8364;'+cost+'</li>';
                html += '</ul>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
            });

            products_div.innerHTML = html;


        }
    }
    document.getElementById("products_container").innerHTML = '';
    document.getElementById("products_container").appendChild(products_div);

    xhttp.open("GET", "model/get_new_arrivals.php", true);
    xhttp.send();
}


