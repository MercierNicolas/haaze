$(document).ready(function(){
	$("#connexion").click(function(){

	//	var id =  "nom="+$("#name").val()+"&prenom="+$("#prenom").val()+"&pseudo="+$("#pseudo").val()+"&mail="+$("#mail").val()+"&password="+$("#pwd").val()+"&conf_password="+$("#confpwd").val();
	//	console.log(id);
		$.ajax({
			type : "POST",
			url : "php/connexion.php",

			data : "mail="+$("#mail").val()+"&pwd="+$("#pwd").val(), 
			dataType : 'html',

		success : function(echo){
			if (echo == "champs_vide"){
				alert("Un/Des champs de saisies est/sont vide !");
			}else if(echo == "erreur"){
				alert("Mots de Passe Ou E-mail Incorrecte !");
			}else{
				document.location.href = "accueil.php";
			}
			
			
       },

       error : function(resultat, statut, erreur){
       		alert("erreur");
       },

       complete : function(resultat, statut){
       		console.log("complete");
       }

	
		});
	});






});