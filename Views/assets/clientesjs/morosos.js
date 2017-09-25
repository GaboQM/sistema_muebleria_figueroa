function getMorosos(){
	var  resultado=document.getElementById("tbody");
  var  name=document.getElementById("name").value;
  var  ap=document.getElementById("ap").value;
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        
        	
       
        resultado.innerHTML=xmlhttp.responseText;
       // alert(xmlhttp.responseText);
      



      }
    }
    xmlhttp.open("GET","Controllers/morososClienteController.php?action=gCM&name="+name+"&ap="+ap,true);
  xmlhttp.send();

}

function mcm(){
  var res=document.getElementById("cm");
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        res.innerHTML=xmlhttp.responseText;
   }
    }
    xmlhttp.open("GET","Controllers/listClienteController.php?action=gCM",true);
  xmlhttp.send();

}
function liberar(idm){

  var msg=confirm("Pulsa OK para confirmar...");
      if (msg) {

xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
      alert(xmlhttp.responseText);
      getMorosos();
   }
    }
    xmlhttp.open("GET","Controllers/morososClienteController.php?action=dlt&id="+idm,true);
  xmlhttp.send();
}
}

function createM(){
   var  idc=document.getElementById("cms").value;
   var  ntj=document.getElementById("idV").value;
   var  vt=document.getElementById("ctd").value;
   var  pdo=document.getElementById("pgd").value;
   var  dv=document.getElementById("dv").value;
     var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
       alert(xmlhttp.responseText);
   }
    }
    xmlhttp.open("GET","Controllers/morososClienteController.php?action=ccm&idc="+idc+"&ntj="+ntj+
      "&vt="+vt+"&pdo="+pdo+"&dv="+dv,true);
  xmlhttp.send();
}
getMorosos();