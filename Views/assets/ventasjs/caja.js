mostrarCtg();
mostrarMRK();
bskProducto();
paintCar();
function mostrarCtg(){
	var  resultado=document.getElementById("cctg");
  var  mrk=document.getElementById("mrk");
	var xmlhttp;
  	xmlhttp=new XMLHttpRequest();

  	xmlhttp.onreadystatechange=function(){
  		if(this.readyState===4 && this.status===200){

				resultado.innerHTML=xmlhttp.responseText;
        //alert(xmlhttp.responseText);
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
//        var mensaje=xmlhttp.responseText;
      



      }
    }
    xmlhttp.open("GET","Controllers/newProductoController.php?action=getMRK",true);
  xmlhttp.send();
}
function bskProductoKey(codigo){
  var  resultado=document.getElementById("v1");
  var xmlhttp;
  //var ntf=document.getElementById("ntf");
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        //ntf.innerHTML="";
        resultado.innerHTML=xmlhttp.responseText;
        
//        var mensaje=xmlhttp.responseText;
     if(codigo==""){
      bskProducto();
     }



      }
    }
    xmlhttp.open("GET","Controllers/cajaController.php?action=bkey&codigo="+codigo,true);
  xmlhttp.send();
}
function bskProducto(){
  
  var  resultado=document.getElementById("v1");
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){

        resultado.innerHTML=xmlhttp.responseText;
//        var mensaje=xmlhttp.responseText;
      



      }
    }
    xmlhttp.open("GET","Controllers/cajaController.php?action=b",true);
  xmlhttp.send();
}

function bsgtg(ctg){
        var  resultado=document.getElementById("v1");
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
    xmlhttp.open("GET","Controllers/cajaController.php?action=bctg&ctg="+ctg,true);
  xmlhttp.send();

 
}

function addCar(id){

        var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
       xmlhttp.responseText;
       
//        
//alert(xmlhttp.responseText);
     
paintCar();


      }
       
    }
    xmlhttp.open("GET","Controllers/cajaController.php?action=addCar&idp="+id,true);
  xmlhttp.send();


}
function deletep(index){
         var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        //alert(xmlhttp.responseText);
      paintCar();
      }
    }
    xmlhttp.open("GET","Controllers/cajaController.php?action=dt&index="+index,true);
  xmlhttp.send();

}
function vaciar(){
         var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        //alert(xmlhttp.responseText);
      paintCar();
      }
    }
    xmlhttp.open("GET","Controllers/cajaController.php?action=clear",true);
  xmlhttp.send();

}

function paintCar(){
    var  resultado=document.getElementById("v2");
         var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
      resultado.innerHTML= xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","Controllers/cajaController.php?action=pc",true);
  xmlhttp.send();
}
function bsmrk(mrk){
   var  resultado=document.getElementById("v1");
  
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
    xmlhttp.open("GET","Controllers/cajaController.php?action=cm&ctg="+ctg+"&mrk="+mrk,true);
  xmlhttp.send();
}
function movt(tp){
  
  location.href="proceso";
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
     

         // alert(xmlhttp.responseText);

      }
    }
    xmlhttp.open("GET","Controllers/procesoController.php?action=vt&tp="+tp,true);
  xmlhttp.send();
}