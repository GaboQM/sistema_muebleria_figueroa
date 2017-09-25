var  resultado=document.getElementById("tbody");

  function mostrarMarca() {
  	// body...
  	var xmlhttp;
  	xmlhttp=new XMLHttpRequest();

  	xmlhttp.onreadystatechange=function(){
  		if(this.readyState===4 && this.status===200){

				resultado.innerHTML=xmlhttp.responseText;



			}
  	}
  	xmlhttp.open("GET","Controllers/marcaController.php?action="+"getMRK",true);
	xmlhttp.send();
  }
    mostrarMarca();

  function editarMarca(mrkID){

    var marcaID="marcaID"+mrkID;
    var borrar="borrar"+mrkID;
    var actualizar="actualizar"+mrkID;
    var editarMarca=marcaID+"-editar";

    var nomMrk=document.getElementById(marcaID).innerHTML;
    var parent=document.querySelector("#"+marcaID);
    if(parent.querySelector("#"+editarMarca)===null){
      document.getElementById(marcaID).innerHTML='<input type="text" style="background-color:#F1D5C0" id="'+editarMarca+'" value="'+ nomMrk+'">';
      document.getElementById(borrar).disabled="true";
      document.getElementById(actualizar).style.display="block";
    }
  }

  function actualizarMarca(mrkID){
    var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    var nombMRK=document.getElementById("marcaID"+mrkID+"-editar").value;
    xmlhttp.onreadystatechange=function(){
      if (this.readyState===4 && this.status===200) {
        //var mensaje=xmlhttp.responseText;
        //alert(mensaje);
         mostrarMarca();
      }
    }
    xmlhttp.open("GET","Controllers/marcaController.php?action=update&idMRK="+mrkID+"&mrkN="+nombMRK,true);
  xmlhttp.send();
  }

  var nuevaVentana =document.getElementById("mymodal");
  function agregarMarca(){
      xmlhttp=new XMLHttpRequest();
      var nuevaMRK=document.getElementById("mrk").value;
      xmlhttp.onreadystatechange=function(){
        if(this.readyState===4 && this.status===200){
             var mensaje=xmlhttp.responseText;
            //alert(mensaje);
           mostrarMarca();

          }
        }
        xmlhttp.open("GET","Controllers/marcaController.php?action=add&mrk="+nuevaMRK,true);
  xmlhttp.send();
  }
function borrarMarca(mrkID){
  var respuesta=confirm("Confirma si estás seguro de eliminar...");
  if(respuesta){
    xmlhttp=new XMLHttpRequest();

    //alert(mrkID);
      xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        var mensaje=xmlhttp.responseText;
       
        mostrarMarca();
      }
    }

    xmlhttp.open("GET","Controllers/marcaController.php?action=delete&dmrk="+mrkID,true);
    xmlhttp.send();

  }


}