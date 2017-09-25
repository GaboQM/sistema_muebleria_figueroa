cargarVenta();
function cargarVenta(){
	var view2=document.getElementById("v2");
	var xmlhttp;
  	xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function(){
  		if(this.readyState===4 && this.status===200){
				view2.innerHTML=xmlhttp.responseText;
				
			}
  	}
  	xmlhttp.open("GET","Controllers/abonarController.php?action=load",true);
	xmlhttp.send();
}


function notificar(idv){
	var mm=document.getElementById("mm").value;
  var dd=document.getElementById("dd").value;
  var aa=document.getElementById("aa").value;
  var des=document.getElementById("des").value;
  var view1=document.getElementById("v1");
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
      
      view1.innerHTML=xmlhttp.responseText;
          
        }
    }
    xmlhttp.open("GET","Controllers/abonarController.php?action=ntf&idv="+idv+"&des="+des+"&aa="+aa+"&mm="+mm+"&dd="+dd,true);
  xmlhttp.send();

}

function abonar(idv){
	var view1=document.getElementById("v1");
	var xmlhttp;
  	xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function(){
  		if(this.readyState===4 && this.status===200){
				view1.innerHTML=xmlhttp.responseText;
				
			}
  	}
  	xmlhttp.open("GET","Controllers/abonarController.php?action=abn&idv="+idv,true);
	xmlhttp.send();
}

function bskKey(id){
	var view2=document.getElementById("v2");
	var tidv=document.getElementById("idv").value;
	var xmlhttp;
  	xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function(){
  		if(this.readyState===4 && this.status===200){
				view2.innerHTML=xmlhttp.responseText;
				if(tidv==""){
					cargarVenta();
				}
			}
  	}
  	xmlhttp.open("GET","Controllers/abonarController.php?action=loadID&idv="+id,true);
	xmlhttp.send();
}


function bskdtll(dtll){
	var view2=document.getElementById("v2");
	var mcp=document.getElementById("mcp").value;
	var name=document.getElementById("name").value;
	var pa=document.getElementById("pa").value;
	var tidv=document.getElementById("idv");
		var xmlhttp;
  	xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function(){
  		if(this.readyState===4 && this.status===200){
				tidv.innerHTML="";
				view2.innerHTML=xmlhttp.responseText;

				
			}
  	}
  	xmlhttp.open("GET","Controllers/abonarController.php?action=loadDTLL&mcp="+mcp+"&name="+name+"&pa="+pa,true);
	xmlhttp.send();


}

function insAbono(idv){
	var view1=document.getElementById("v1");
	var cnt=document.getElementById("cnt").value;
	var cdor=document.getElementById("ncdor").value;
	
	var xmlhttp;
  	xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function(){
  		if(this.readyState===4 && this.status===200){
				view1.innerHTML=xmlhttp.responseText;

				
			}
  	}
  	xmlhttp.open("GET","Controllers/abonarController.php?action=ist&idv="+idv+"&cnt="+cnt+"&cdor="+cdor,true);
	xmlhttp.send();

}
function cambiarVenta(idv){
	  var respuesta=confirm("Confirma si estás seguro hacer el cambio a la cuenta");
  if(respuesta){
    xmlhttp=new XMLHttpRequest();


      xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
      	if(xmlhttp.responseText==1){
      		alert("Cambios hecho con exito!");
      		location.href="abonar";
      	}else{
      		alert("Ha ocurrido un error"+xmlhttp.responseText);
      		

      	}

      }
    }

    xmlhttp.open("GET","Controllers/abonarController.php?action=upd&idv="+idv,true);
    xmlhttp.send();
}
}
function anular(idv){
	  var respuesta=confirm("Confirma si estás seguro en eliminar:");
  if(respuesta){
    xmlhttp=new XMLHttpRequest();


      xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
      	if(xmlhttp.responseText==1){
      		alert("Cambios hecho con exito!");
      		location.href="abonar";
      	}else{
      		alert("Ha ocurrido un error"+xmlhttp.responseText);
      		

      	}

      }
    }

    xmlhttp.open("GET","Controllers/abonarController.php?action=dt&idv="+idv,true);
    xmlhttp.send();

}
}



function imprimir(idv){
  //alert(idv);
  var view1=document.getElementById("v1");
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        view1.innerHTML=xmlhttp.responseText;
       }
}
    xmlhttp.open("GET","Controllers/abonarController.php?action=printf&idv="+idv,true);
  xmlhttp.send();
  

}

