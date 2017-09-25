	
			function retardo(){
				var resultado= document.getElementById("msg");
				resultado.innerHTML= '<img src="anim.gif">';
			}
	function logout(){
	var xmlhttp;
  	xmlhttp=new XMLHttpRequest();

  	xmlhttp.onreadystatechange=function(){
  		if(this.readyState===4 && this.status===200){
  			location.href="index";
			}
  	}
  	xmlhttp.open("GET","Controllers/principalController.php?action=exit",true);
	xmlhttp.send();
}
		function logear(){
			var resultado= document.getElementById("msg");
			var xmlhttp;
				xmlhttp=new XMLHttpRequest();

		    var user=document.getElementById("user").value;
		    var pass=document.getElementById("pass").value;
			var data="user="+user+"&pass="+pass;		    

		xmlhttp.onreadystatechange=function(){

			if(xmlhttp.readyState===4 && xmlhttp.status===200){
				var mensaje=xmlhttp.responseText;
				if(mensaje==1){
					location.href="principal";

				}else{
					resultado.innerHTML=mensaje;
				}

				
				

			}
		}

		xmlhttp.open("POST","Controllers/loginController_.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send(data);
		}

