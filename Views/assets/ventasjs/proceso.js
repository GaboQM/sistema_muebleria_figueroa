view();

function view(){
  var  res=document.getElementById("vp");
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        
        res.innerHTML=xmlhttp.responseText;
//        var mensaje=xmlhttp.responseText;
      



      }
    }
    xmlhttp.open("GET","Controllers/procesoController.php?action=vt",true);
  xmlhttp.send();
}
function selectC(val){
  var  res=document.getElementById("dtlles");
  var select=document.getElementById("idc").value;
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();
      
   if (select=="SELECCIONE EL CLIENTE:") {
            res.innerHTML="";
   }else{
     xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        
        res.innerHTML=xmlhttp.responseText;
//        var mensaje=xmlhttp.responseText;
    



      }
    }
    xmlhttp.open("GET","Controllers/procesoController.php?action=dtyctdo",true);
  xmlhttp.send();
   }

}
function selectVent(){
  var  res=document.getElementById("dtlles");

  var select=document.getElementById("idv").value;
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();
      
   if (select=="SELECCIONE LA TARJETA:") {
            res.innerHTML="";
   }else{
     xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        
        res.innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","Controllers/procesoController.php?action=dtll&idv="+select,true);
  xmlhttp.send();
   }

}

function selectCvp(val){
var tp=document.getElementById("tp").innerHTML;

  var  res=document.getElementById("dtlles");
  var select=document.getElementById("idc").value;
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();
     
   if (select=="SELECCIONE EL CLIENTE:") {
            res.innerHTML="";
   }else{
     xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        //alert(xmlhttp.responseText);
        res.innerHTML=xmlhttp.responseText;
//        var mensaje=xmlhttp.responseText;
    



      }
    }
    xmlhttp.open("GET","Controllers/procesoController.php?action=dtycvp&tp="+tp+"&idc="+select,true);
  xmlhttp.send();
   }

}
function selectCc(){
var tp=document.getElementById("tp").innerHTML;

  var  res=document.getElementById("dtlles");
  var select=document.getElementById("idc").value;

  var xmlhttp;
    xmlhttp=new XMLHttpRequest();
     
   if (select=="SELECCIONE EL CLIENTE:") {
            res.innerHTML="";
   }else{
     xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
        //alert(xmlhttp.responseText);
        res.innerHTML=xmlhttp.responseText;

//        var mensaje=xmlhttp.responseText;
    



      }
    }
    xmlhttp.open("GET","Controllers/procesoController.php?action=cdt&idc="+select,true);
  xmlhttp.send();
   }

}
function descontar(val){
   var select=document.getElementById(val).value;
   var pctdo=document.getElementById("pc"+val).innerHTML;
   var des=document.getElementById("ds"+val).innerHTML;
   var totalCal=document.getElementById("tt").innerHTML;
   var total=document.getElementById("tt");

   if(select=="Aplicar"){
    totalCal=totalCal-des;
    desprod(val,1);

   }else{
    totalCal=totalCal-(-des);
    desprod(val,0);
   }
   total.innerHTML="";
   total.innerHTML=totalCal;
}

function desprod(idp,ac){
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
      if(this.readyState===4 && this.status===200){
   
//        var mensaje=xmlhttp.responseText;
          //alert(xmlhttp.responseText);
      

      }
    }
    xmlhttp.open("GET","Controllers/procesoController.php?action=ds&idp="+idp+"&ac="+ac,true);
  xmlhttp.send();  

}

function finalizar(){
        var respuesta=confirm("Pulsa ok para confirmar la venta:");
         
        if(respuesta){
            var idv=document.getElementById("idv");
            var bt=document.getElementById("bt");
            var idc=document.getElementById("idc").value;
           
            xmlhttp=new XMLHttpRequest();

                xmlhttp.onreadystatechange=function(){
               if(this.readyState===4 && this.status===200){
                  var res=xmlhttp.responseText;
                if(res>0){
                 idv.innerHTML='<input   required="required" value="'+res+'"class="form-control">';
                alert("Venta procesada con exito! El numero de tarjeta generada es: "+res);
                bt.innerHTML='<button type="button" class="btn btn-round btn-success"  onclick="window.print();" ><i class="fa fa-print fa-lg" > Imprimir</i></button>    <a href="caja" > <button type="button" class="btn btn-round btn-success"   ><i class="fa fa-arrow-left  fa-lg" >Regresar a la caja</i></button></a>';
                }else{
                  alert("Ha ocurrido un error, revise bien los datos proporcionado");
                }


                  }
                }

                xmlhttp.open("GET","Controllers/procesoController.php?action=fin&idc="+idc,true);
                xmlhttp.send();

              }
}
function finalizarf(){
        var respuesta=confirm("Pulsa ok para confirmar la venta:");
         
        if(respuesta){
            var idv=document.getElementById("idv").value;

            var bt=document.getElementById("bt");
            //var idc=document.getElementById("idc").value;
           
            xmlhttp=new XMLHttpRequest();

                xmlhttp.onreadystatechange=function(){
               if(this.readyState===4 && this.status===200){
                  var res=xmlhttp.responseText;
                
                if(res>0){
                 
                alert("Fusion de tarjeta finalizado con exito!");
                bt.innerHTML='<button type="button" class="btn btn-round btn-success"  onclick="window.print();" ><i class="fa fa-print fa-lg" > Imprimir</i></button>    <a href="caja" > <button type="button" class="btn btn-round btn-success"   ><i class="fa fa-arrow-left  fa-lg" >Regresar a la caja</i></button></a>';
                }else{
                  alert("Ha ocurrido un error, revise bien los datos proporcionado");
                }


                  }
                }

                xmlhttp.open("GET","Controllers/procesoController.php?action=finf&idv="+idv,true);
                xmlhttp.send();

              }
}


 function finalizarvp(){
        var respuesta=confirm("Pulsa ok para confirmar la venta:");
         
        if(respuesta){
            var idv=document.getElementById("idv");
            var bt=document.getElementById("bt");
            var idc=document.getElementById("idc").value;
            var pgi=document.getElementById("pgi").value;
            var tp=document.getElementById("tp").innerHTML;
            xmlhttp=new XMLHttpRequest();

                xmlhttp.onreadystatechange=function(){
               if(this.readyState===4 && this.status===200){
                  var res=xmlhttp.responseText;
                if(res>0){
                 idv.innerHTML='<input   required="required" value="'+res+'"class="form-control">';
                alert("Venta procesada con exito! El numero de tarjeta generada es: "+res);
                bt.innerHTML='<button type="button" class="btn btn-round btn-success"  onclick="window.print();" ><i class="fa fa-print fa-lg" > Imprimir</i></button>    <a href="caja" > <button type="button" class="btn btn-round btn-success"   ><i class="fa fa-arrow-left  fa-lg" >Regresar a la caja</i></button></a>';
                }else{
                  alert("Ha ocurrido un error, revise bien los datos proporcionado");
                }


                  }
                }

                xmlhttp.open("GET","Controllers/procesoController.php?action=finv&idc="+idc+"&pgi="+pgi+"&tp="+tp,true);
                xmlhttp.send();

              }
}

function finalizarc(){
        var respuesta=confirm("Pulsa ok para confirmar la venta:");
         
        if(respuesta){
            var idv=document.getElementById("idv");
            var bt=document.getElementById("bt");
            var idc=document.getElementById("idc").value;
            var pgi=document.getElementById("pgi").value;
            var tmp=document.getElementById("tmpg").value;
            xmlhttp=new XMLHttpRequest();

                xmlhttp.onreadystatechange=function(){
               if(this.readyState===4 && this.status===200){
                 res=xmlhttp.responseText;
                if(res>0){
                 idv.innerHTML='<input   required="required" value="'+res+'"class="form-control">';
                alert("Venta procesada con exito! El numero de tarjeta generada es: "+res);
                bt.innerHTML='<button type="button" class="btn btn-round btn-success"  onclick="window.print();" ><i class="fa fa-print fa-lg" > Imprimir</i></button>    <a href="caja" > <button type="button" class="btn btn-round btn-success"   ><i class="fa fa-arrow-left  fa-lg" >Regresar a la caja</i></button></a>';
                }else{
                  alert("Ha ocurrido un error, revise bien los datos proporcionado");
                }


                  }
                }

                xmlhttp.open("GET","Controllers/procesoController.php?action=finc&idc="+idc+"&pgi="+pgi+"&tmp="+tmp,true);
                xmlhttp.send();

              }
}