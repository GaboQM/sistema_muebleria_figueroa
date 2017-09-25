function guardarCliente(){
 		var name=document.getElementById("name").value;
 		var aP=document.getElementById("aP").value;
 		var aM=document.getElementById("aM").value;
 		var rfc=document.getElementById("rfc").value;
 		var tel=document.getElementById("tel").value;
 		var mpo=document.getElementById("mpo").value;
 		var dmc=document.getElementById("dmc").value;
 		var rfn=document.getElementById("rfn").value;

 		xmlhttp=new XMLHttpRequest();
  
  	xmlhttp.onreadystatechange=function(){
  		if(this.readyState===4 && this.status===200){
  			//res1.innerHTML=xmlhttp.responseText;

  			if (xmlhttp.responseText!="") {
  				alert(xmlhttp.responseText);
  			}
			}
  	}
  	xmlhttp.open("GET","Controllers/addClienteController.php?action=create&name="+name+"&aP="+aP+"&aM="+aM+"&rfc="+
  					"&tel="+"&mpo="+mpo+"&dmc="+dmc+"&rfn="+rfn,true);
  	xmlhttp.send();

 }