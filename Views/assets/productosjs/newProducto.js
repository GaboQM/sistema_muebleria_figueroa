
function mostrarCtg(){
	var  resultado=document.getElementById("cctg");
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
function addProducto(){
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
  			res1.innerHTML=xmlhttp.responseText;

  			//alert(xmlhttp.responseText);
				



			}
  	}
  	xmlhttp.open("GET","Controllers/newProductoController.php?action=create&ctg="+ctg+
  		"&mrk="+mrk+"&key="+key+"&des="+des+"&pvc="+pvc+"&desc="+desc+"&crd="+crd+"&eng="+eng+
  		"&sm="+sm+"&qm="+qm+"&ms="+ms+"&p2p="+p2p+"&p3p="+p3p+"&p4p="+p4p,true);
  	xmlhttp.send();
  }
function bsgtg(ctg){

}
function bsmrk(mrk){
  
}

function keyRepeat_1(){
       var clave=document.getElementById("key").value;
        var kr=document.getElementById("kr_1");
              var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        //alert(clave);
        if(clave==""){
          kr.innerHTML=="";
        }else{
          kr.innerHTML=xmlhttp.responseText;
        }
        
//        var mensaje=xmlhttp.responseText;
     



      }
    }
    xmlhttp.open("GET","Controllers/newProductoController.php?action=kr&key="+clave,true);
  xmlhttp.send();
}
function keyRepeat(){
       var clave=document.getElementById("key").value;
        var kr=document.getElementById("kr");
              var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        //alert(clave);
        if(clave==""){
          kr.innerHTML=="";
        }else{
          kr.innerHTML=xmlhttp.responseText;
        }
        
//        var mensaje=xmlhttp.responseText;
     



      }
    }
    xmlhttp.open("GET","Controllers/newProductoController.php?action=kr&key="+clave,true);
  xmlhttp.send();
}