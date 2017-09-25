var idcG="";
function redid(idc){
  //alert(idp);
  idcG=idc;
  var name=document.getElementById("name");
  var ap=document.getElementById("ap");
  var  resultado=document.getElementById("tbody");
  
  name.disabled =true;
        ap.disabled =true;
  xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
       
      

      resultado.innerHTML=xmlhttp.responseText;
        //alert(ctg);
//        var mensaje=xmlhttp.responseText;
     



      }
    }
    xmlhttp.open("GET","Controllers/updateClienteController.php?action=edit&idc="+idc,true);
  xmlhttp.send();

}


function upd(){

    var  name=document.getElementById("nom").value;
    var  ap=document.getElementById("app").value;
    var  am=document.getElementById("am").value;
    var  rfc=document.getElementById("rfc").value;
    var  tel=document.getElementById("tel").value;
    var  dmc=document.getElementById("dmc").value;
    var  rfr=document.getElementById("rfr").value;
      xmlhttp=new XMLHttpRequest();
  
    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        //res1.innerHTML=xmlhttp.responseText;
       //alert(ap);
        alert(xmlhttp.responseText);
        



      }
    }
    xmlhttp.open("GET","Controllers/updateClienteController.php?action=upd&name="+name+"&ap="+ap+"&am="+am+"&rfc="+rfc+"&tel="
      +tel+"&dmc="+dmc+"&rfr="+rfr+"&idc="+idcG,true);
    xmlhttp.send();
  }