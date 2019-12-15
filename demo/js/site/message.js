function setSender(id){
    document.getElementById("toSender").value = id;
}

function setProduct(id){
    document.getElementById("sendProductId").value = id;
}

function sendMessage() {
    var to = document.getElementById("toSender").value;
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

function deleteMessage(sender) {

  console.log(sender);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var response = this.responseText;
      console.log(response);
      alert(response);
      location.reload();
    }
  };
  xhttp.open("POST", "model/delete_message.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("sender="+sender);
}