function addToWishlist(id){
    console.log(id);
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            var result = this.responseText;
            alert(result);
            //loadWishlist();
        }
    }
    console.log("model/wishlist.php?product_id="+id);
    xhttp.open("GET", "model/wishlist.php?product_id="+id, true);
    xhttp.send();
}

function deleteFromWishlist(id){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            var result = this.responseText;
            alert(result);
            location.reload();
        }
    }
    console.log("model/delete_wishlist_product.php?product_id="+id);
    xhttp.open("GET", "model/delete_wishlist_product.php?product_id="+id, true);
    xhttp.send();
}
