$(document).ready(function(){
	$("#connexion").click(function(){
		$.ajax({
			type : "POST",
			url : "php/connexion.php",

			data : "mail="+$("#mail").val()+"&pwd="+$("#pwd").val(), 
			dataType : 'html',

		success : function(echo){
			if (echo == "champs_vide"){
				alert("Un ou plusieurs champs sont vides !");
				$("#mail").add("#pwd").css({"background-color":"crimson"})
			}else if(echo == "erreur"){
				alert("Mots de Passe Ou E-mail incorrect !");
				$("#mail").add("#pwd").css({"background-color":"crimson"})
			}else{
				document.location.href = "accueil.php";
			}
			
			
       },

       error : function(resultat, statut, erreur){
       		alert(resultat, statut, erreur);
       },



	
		});
	});

$("#mail").click(function(){
$(this).val("");	
})
$("#pwd").click(function(){
$(this).val("");	
})




});