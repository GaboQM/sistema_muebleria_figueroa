cargarAviso();
function cargarAviso(){
	var view2=document.getElementById("v2");
	var xmlhttp;
  	xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function(){
  		if(this.readyState===4 && this.status===200){
				view2.innerHTML=xmlhttp.responseText;
				
			}
  	}
  	xmlhttp.open("GET","Controllers/principalController.php?action=load",true);
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
					cargarAviso();
				}
			}
  	}
  	xmlhttp.open("GET","Controllers/principalController.php?action=loadID&idv="+id,true);
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
  	xmlhttp.open("GET","Controllers/principalController.php?action=loadDTLL&mcp="+mcp+"&name="+name+"&pa="+pa,true);
	xmlhttp.send();


}