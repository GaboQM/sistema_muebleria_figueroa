mcm();
function mcm(){
  var res=document.getElementById("lc");
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

function registrar(){
  
  var dd=document.getElementById("dd").value;
  var mm=document.getElementById("mm").value;
  var aa=document.getElementById("aa").value;
  var mp=document.getElementById("mp").value;
  var tp=document.getElementById("tp").value;
  var idc=document.getElementById("cms").value; 
  var vt=document.getElementById("vt").value; 
  var pp=document.getElementById("pp").value;
  var dtll=document.getElementById("dtll").value;
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        res=xmlhttp.responseText;
        alert("Tarjeta registrada con el numero: "+res);
   }
    }
    xmlhttp.open("GET","Controllers/registrarController.php?action=reg&dd="+dd
      +"&mm="+mm+"&aa="+aa+"&mp="+mp+"&tp="+tp+"&idc="+idc+"&vt="+vt+"&pp="+pp+"&dtll="+dtll,true);
  xmlhttp.send();

}