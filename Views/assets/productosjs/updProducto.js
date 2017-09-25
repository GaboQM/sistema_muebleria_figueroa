mostrarCtg();
mostrarMRK();
bskProducto();
var idpG=0;
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
function mostrarCtg_(){
  var  resultado=document.getElementById("ctgo");
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
    xmlhttp.open("GET","Controllers/updateProductoController.php?action=getCtg",true);
  xmlhttp.send();
}
function mostrarMRK_(){
	var  res=document.getElementById("mrko");
	var xmlhttp;
  	xmlhttp=new XMLHttpRequest();

  	xmlhttp.onreadystatechange=function(){
  		if(this.readyState===4 && this.status===200){
        
				res.innerHTML=xmlhttp.responseText;
//				var mensaje=xmlhttp.responseText;

			}
  	}
  	xmlhttp.open("GET","Controllers/updateProductoController.php?action=gmk",true);
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
    xmlhttp.open("GET","Controllers/updateProductoController.php?action=b",true);
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
    xmlhttp.open("GET","Controllers/updateProductoController.php?action=bkey&codigo="+codigo,true);
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
    xmlhttp.open("GET","Controllers/updateProductoController.php?action=bctg&ctg="+ctg,true);
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
    xmlhttp.open("GET","Controllers/updateProductoController.php?action=cm&ctg="+ctg+"&mrk="+mrk,true);
  xmlhttp.send();
}

function redid(idp){
  idpG=idp;
  var keydiv=document.getElementById("keydiv");
  var  resultado=document.getElementById("tbody");
  var mrk=document.getElementById("mrc");
    var ctg=document.getElementById("cctg");
  //
  xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
       keydiv.innerHTML="";
       mrk.innerHTML="";
       ctg.innerHTML="";
      

      resultado.innerHTML=xmlhttp.responseText;
      mostrarMRK_();
      mostrarCtg_();
        //alert(ctg);
//        var mensaje=xmlhttp.responseText;
     



      }
    }
    xmlhttp.open("GET","Controllers/updateProductoController.php?action=edit&id="+idp,true);
  xmlhttp.send();

}


function upd(){

    var  ctg=document.getElementById("ctg").value;
    var  mrk=document.getElementById("mrk").value;
    var  key=document.getElementById("key").value;
    var  des=document.getElementById("des").value;
    var  pvc=document.getElementById("pctd").value;
    var  desc=document.getElementById("dctd").value;
    var  crd=document.getElementById("pcrd").value;
    var  eng=document.getElementById("ecrd").value;
    var  sm=document.getElementById("psm").value;
    var  qm=document.getElementById("pqm").value;
    var  ms=document.getElementById("pms").value;
    var  p2p=document.getElementById("p2").value;
    var  p3p=document.getElementById("p3").value;
    var  p4p=document.getElementById("p4").value;
    var res1=document.getElementById("ntf");
      xmlhttp=new XMLHttpRequest();
  
    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        //res1.innerHTML=xmlhttp.responseText;
        
        alert(xmlhttp.responseText);
        



      }
    }
    xmlhttp.open("GET","Controllers/updateProductoController.php?action=upd&ctg="+ctg+
      "&mrk="+mrk+"&key="+key+"&des="+des+"&pvc="+pvc+"&desc="+desc+"&crd="+crd+"&eng="+eng+
      "&sm="+sm+"&qm="+qm+"&ms="+ms+"&p2p="+p2p+"&p3p="+p3p+"&p4p="+p4p+"&idp="+idpG,true);
    xmlhttp.send();
  }