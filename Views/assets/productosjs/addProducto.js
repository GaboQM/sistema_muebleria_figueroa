mostrarCtg();
mostrarMRK();
bskProducto();
function mostrarCtg(){
	var  resultado=document.getElementById("cctg");
  var  mrk=document.getElementById("mrk");
	var xmlhttp;
  	xmlhttp=new XMLHttpRequest();

  	xmlhttp.onreadystatechange=function(){
  		if(this.readyState===4 && this.status===200){

				resultado.innerHTML=xmlhttp.responseText;
				//var mensaje=xmlhttp.responseText;
      



			}
  	}
  	xmlhttp.open("GET","Controllers/newProductoController.php?action=getCateg",true);
	xmlhttp.send();
}

function mostrarMRK(){
	var  res=document.getElementById("mrc");
	var xmlhttp;
  	xmlhttp=new XMLHttpRequest();

  	xmlhttp.onreadystatechange=function(){
  		if(this.readyState===4 && this.status===200){

				res.innerHTML=xmlhttp.responseText;
//				var mensaje=xmlhttp.responseText;
      



			}
  	}
  	xmlhttp.open("GET","Controllers/newProductoController.php?action=getMRK",true);
	xmlhttp.send();
}
mostrarCtg();
mostrarMRK();
bskProductoKey();
bskProducto();
function bskProducto(){
  
  var  resultado=document.getElementById("tbody");
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){

        resultado.innerHTML=xmlhttp.responseText;
//        var mensaje=xmlhttp.responseText;
      



      }
    }
    xmlhttp.open("GET","Controllers/addProductoController.php?action=b",true);
  xmlhttp.send();
}
function bskProductoKey(codigo){
  var  resultado=document.getElementById("tbody");
  var xmlhttp;
  var ntf=document.getElementById("ntf");
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        ntf.innerHTML="";
        resultado.innerHTML=xmlhttp.responseText;

//        var mensaje=xmlhttp.responseText;
     if(codigo==""){
      bskProducto();
     }



      }
    }
    xmlhttp.open("GET","Controllers/addProductoController.php?action=bkey&codigo="+codigo,true);
  xmlhttp.send();
}

function bsgtg(ctg){
        var  resultado=document.getElementById("tbody");
        var ctg=ctg.value;
        var key=document.getElementById("key");
        var ntf=document.getElementById("ntf");
        var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        key.innerHTML="";
        ntf.innerHTML="";
        resultado.innerHTML=xmlhttp.responseText;
        
//        var mensaje=xmlhttp.responseText;
     



      }
    }
    xmlhttp.open("GET","Controllers/addProductoController.php?action=bctg&ctg="+ctg,true);
  xmlhttp.send();

 
}
function bsmrk(mrk){
   var  resultado=document.getElementById("tbody");
  
    var key=document.getElementById("key");
    var mrk=document.getElementById("mrk").value;
    var ctg=document.getElementById("ctg").value;
    var ntf=document.getElementById("ntf");
    var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        key.innerHTML="";
        ntf.innerHTML="";
        resultado.innerHTML=xmlhttp.responseText;
        //alert(ctg);
//        var mensaje=xmlhttp.responseText;
     



      }
    }
    xmlhttp.open("GET","Controllers/addProductoController.php?action=cm&ctg="+ctg+"&mrk="+mrk,true);
  xmlhttp.send();
  
  
}
function plusP(idp){
    var cant=document.getElementById(idp).value;
    var ntf=document.getElementById("ntf");
    var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        bskProducto();
        ntf.innerHTML=xmlhttp.responseText;
        
        //alert(ctg);
//        var mensaje=xmlhttp.responseText;
     



      }
    }
    xmlhttp.open("GET","Controllers/addProductoController.php?action=plus&cant="+cant+"&idp="+idp,true);
  xmlhttp.send();

}
function minusP(idp){
  var cant=document.getElementById(idp).value;
    var ntf=document.getElementById("ntf");
    var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        bskProducto();
        ntf.innerHTML=xmlhttp.responseText;
        
        //alert(ctg);
//        var mensaje=xmlhttp.responseText;
     



      }
    }
    xmlhttp.open("GET","Controllers/addProductoController.php?action=minus&cant="+cant+"&idp="+idp,true);
  xmlhttp.send();
  
}

