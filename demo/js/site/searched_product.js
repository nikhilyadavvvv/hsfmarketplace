function loadProducts(filter){

    
    var url_string = window.location.href;
    var url = new URL(url_string);
    var s = url.searchParams.get("s");
    var c = url.searchParams.get("c");
    if (c==null) {
        c = '';
    }
    console.log(c);
    var url =  "model/searched_product.php?s="+s+"&f="+filter+"&c="+c;
    console.log(url);
    var html = '';
    var i = 0;
    document.getElementById("products_container").innerHTML ="";
    var products_div = document.createElement("div");
    document.getElementById("search_input").value = s;
    //////////// AJAX REQUEST TO GET DATA ////////////////////
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            var result = this.responseText;
            if(result.length==2){
                document.getElementById("products_container").innerHTML = "Sorry the Searched Product is currently unavailable";
            }
            var results = JSON.parse(result);
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
                html += '<a target="_blank" href="'+product_link+'">';
                html += '<img src="'+image+'" alt="product images">';
                html += '</a>';
                html += '</div>';
                html += '<div class="fr__product__inner">';
                html += '<h4><a target="_blank" href="'+product_link+'">'+name+'</a></h4>';
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
    document.getElementById("products_container").appendChild(products_div);
    console.log(url);
    xhttp.open("GET", url, true);
    xhttp.send();
}


function search_category(id){

    
    var url_string = window.location.href;
    var url = new URL(url_string);
    //var s = url.searchParams.get("s");
    var s = getUrlVars()['s'];
    //var f = getUrlVars()['f'];
    var f = document.getElementById("filter").value;
    var html = '';
    var i = 0;
    document.getElementById("products_container").innerHTML ="";
    var products_div = document.createElement("div");
    document.getElementById("search_input").value = s;
    //////////// AJAX REQUEST TO GET DATA ////////////////////
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            var result = this.responseText;
            if(result.length==2){
                document.getElementById("products_container").innerHTML = "Sorry the Searched Product is currently unavailable";
            }
            var results = JSON.parse(result);
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
    //var url = "model/search_category.php?category="+id+"&s="+s;
    var url =  "model/searched_product.php?s="+s+"&f="+f+"&c="+id;
    if (id === undefined) {
        url =  "model/searched_product.php?s="+s+"&f="+f+"&c=";
    }
    console.log(url);
    document.getElementById("products_container").appendChild(products_div);
    xhttp.open("GET", url, true);
    xhttp.send();
}


function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}