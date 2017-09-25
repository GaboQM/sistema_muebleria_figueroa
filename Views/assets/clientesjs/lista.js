function getCliente(){
  var  resultado=document.getElementById("tbody");
  var  name=document.getElementById("name");
  var  ap=document.getElementById("ap");
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        name.disabled =false;
        ap.disabled =false;
        resultado.innerHTML=xmlhttp.responseText;
       // alert(xmlhttp.responseText);
      



      }
    }
    xmlhttp.open("GET","Controllers/listClienteController.php?action=getCliente",true);
  xmlhttp.send();
}
function getClienteK(){
  
  var  resultado=document.getElementById("tbody");
  var  name=document.getElementById("name").value;
  var  ap=document.getElementById("ap").value;
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        name.disabled =false;
        ap.disabled =false;

        resultado.innerHTML=xmlhttp.responseText;
       // alert(xmlhttp.responseText);
      



      }
    }
    xmlhttp.open("GET","Controllers/listClienteController.php?action=getClienteK&name="+name+"&ap="+ap,true);
  xmlhttp.send();
}
getCliente();