function buscarxpCorreo() {
    var correo = document.getElementById("correo").value;
    if (correo == "") {
    document.getElementById("informacion").innerHTML = ""; 
    } else { 
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    //alert("llegue");
    document.getElementById("informacion").innerHTML = this.responseText;
    }
    };
    xmlhttp.open("GET","../../public/controladores/buscaxCorreo.php?correo="+correo,true);
    xmlhttp.send();
    }
    return false;
}