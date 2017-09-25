var  resultado=document.getElementById("tbody");
  function mostrarCategoria() {
  	// body...
  	var xmlhttp;
  	xmlhttp=new XMLHttpRequest();

  	xmlhttp.onreadystatechange=function(){
  		if(this.readyState===4 && this.status===200){

				resultado.innerHTML=xmlhttp.responseText;



			}
  	}
  	xmlhttp.open("GET","Controllers/categoriaController.php?action="+"getCateg",true);
	xmlhttp.send();
  }
  mostrarCategoria();

  function editarCategoria(ctgID){
    var categoriaID="categoriaID"+ctgID;
    var borrar="borrar"+ctgID;
    var actualizar="actualizar"+ctgID;
    var editarCategoria=categoriaID+"-editar";

    var nomCtg=document.getElementById(categoriaID).innerHTML;
    var parent=document.querySelector("#"+categoriaID);
    if(parent.querySelector("#"+editarCategoria)===null){
      document.getElementById(categoriaID).innerHTML='<input type="text" style="background-color:#F1D5C0" id="'+editarCategoria+'" value="'+ nomCtg+'">';
      document.getElementById(borrar).disabled="true";
      document.getElementById(actualizar).style.display="block";
    }
  }

  function actualizarCategoria(ctgID){
    var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    var nombCtg=document.getElementById("categoriaID"+ctgID+"-editar").value;
    xmlhttp.onreadystatechange=function(){
      if (this.readyState===4 && this.status===200) {
        var mensaje=xmlhttp.responseText;
        //alert(mensaje);
         mostrarCategoria();
      }
    }
    xmlhttp.open("GET","Controllers/categoriaController.php?action=update&idCtg="+ctgID+"&ctgN="+nombCtg,true);
  xmlhttp.send();
  }
  var nuevaVentana =document.getElementById("mymodal");
  function agregarCategoria(){
      xmlhttp=new XMLHttpRequest();
      var nuevaCtg=document.getElementById("ctg").value;
      xmlhttp.onreadystatechange=function(){
        if(this.readyState===4 && this.status===200){
             var mensaje=xmlhttp.responseText;
       
           mostrarCategoria();



          }
        }
        xmlhttp.open("GET","Controllers/categoriaController.php?action=add&ctg="+nuevaCtg,true);
  xmlhttp.send();
  }
function borrarCategoria(ctgID){
  var respuesta=confirm("Confirma si estás seguro de eliminar...");
  if(respuesta){
    xmlhttp=new XMLHttpRequest();


      xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){

        //alert(mensaje);
        mostrarCategoria();



      }
    }

    xmlhttp.open("GET","Controllers/categoriaController.php?action=delete&ctgID="+ctgID,true);
    xmlhttp.send();

  }


}