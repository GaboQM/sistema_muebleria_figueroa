cargarntf();
function cargarntf(){
	var view2=document.getElementById("v2");
	var xmlhttp;
  	xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function(){
  		if(this.readyState===4 && this.status===200){
				view2.innerHTML=xmlhttp.responseText;
				
			}
  	}
  	xmlhttp.open("GET","Controllers/notificacionesController.php?action=load",true);
	xmlhttp.send();
}
function atender(id){
	var respuesta=confirm("Confirma OK, para marcar como atendida la notificacion:");
  if(respuesta){
    xmlhttp=new XMLHttpRequest();


      xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
      	if(xmlhttp.responseText==1){
      		
      		location.href="notificaciones";
      	}else{
      		alert("Ha ocurrido un error"+xmlhttp.responseText);
      		

      	}

      }
  }
      xmlhttp.open("GET","Controllers/notificacionesController.php?action=da&idn="+id+"&ac=pg",true);
	xmlhttp.send();
}
	
}
function cancelar(id){
		var respuesta=confirm("Confirma OK, para cancelar la notificacion:");
  if(respuesta){
    xmlhttp=new XMLHttpRequest();


      xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
      	if(xmlhttp.responseText==1){
      		
      		location.href="notificaciones";
      	}else{
      		alert("Ha ocurrido un error"+xmlhttp.responseText);
      		

      	}

      }
  }
      xmlhttp.open("GET","Controllers/notificacionesController.php?action=da&idn="+id+"&ac=dt",true);
	xmlhttp.send();
}
}
function bskKey(dtll){
	var view2=document.getElementById("v2");

		var xmlhttp;
  	xmlhttp=new XMLHttpRequest();
  	if(dtll==""){
  		cargarntf();

  	}
  	xmlhttp.onreadystatechange=function(){
  		if(this.readyState===4 && this.status===200){
				
				view2.innerHTML=xmlhttp.responseText;

				
			}
  	}
  	xmlhttp.open("GET","Controllers/notificacionesController.php?action=loadID&des="+dtll,true);
	xmlhttp.send();


}