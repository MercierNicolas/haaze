$(document).ready(function(){
	$("#inscription").click(function(){
		$.ajax({
			type : "POST",
			url : "php/inscription.php",

			data :  "nom="+$("#nom").val()+"&prenom="+$("#prenom").val()+"&pseudo="+$("#pseudo").val()+"&mail="+$("#mail").val()+"&password="+$("#pwd").val()+"&conf_password="+$("#confpwd").val(),
			dataType : 'html',

		success : function(echo){
			if(echo == "champs_vide"){
				$("#nom").add("#prenom").add("#pseudo").add("#mail").add("#pwd").add("#confpwd").css({
					"background-color":"crimson"
				})
				alert("Un ou plusieurs champs sont vides !");
			}else if(echo == "mdp"){
				$("#pwd").add("#confpwd").css({
					"background-color":"crimson"
				})
				alert("Les mots de passe ne sont pas identiques !");
			}else if(echo == "mail") {
				$("#mail").css({"background-color":"crimson"})
				alert("E-mail déja utilisée ou pas valide ! ");
			}else if(echo == "pseudo"){
				$("#pseudo").css({"background-color":"crimson"})
				alert("Pseudo déja utilisé !");
			}else if(echo == "ok"){
				alert("Votre compte a été créé avec succès ! Vous allez être redirigé vers la page de connexion !");
				window.location = "connexion.html";
			}else{
				alert(echo);
			}
			
			
       },


	
		});
	});
$("#nom").click(function(){
$(this).val("");	
})
$("#prenom").click(function(){
$(this).val("");	
})
$("#pseudo").click(function(){
$(this).val("");	
})
$("#mail").click(function(){
$(this).val("");	
})
$("#pwd").click(function(){
$(this).val("");	
})
$("#confpwd").click(function(){
$(this).val("");	
})

 


});