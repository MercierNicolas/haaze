$(document).ready(function(){
	console.log("test");

	$("#bouton").click(function(){

	//	var id =  "nom="+$("#name").val()+"&prenom="+$("#prenom").val()+"&pseudo="+$("#pseudo").val()+"&mail="+$("#mail").val()+"&password="+$("#pwd").val()+"&conf_password="+$("#confpwd").val();
	//	console.log(id);
		$.ajax({
			type : "POST",
			url : "php/inscription.php",

			data :  "nom="+$("#name").val()+"&prenom="+$("#prenom").val()+"&pseudo="+$("#pseudo").val()+"&mail="+$("#mail").val()+"&password="+$("#pwd").val()+"&conf_password="+$("#confpwd").val(),
			dataType : 'html',

		success : function(echo){
			if(echo == "champs_vide"){
				alert("Un/Des champs de saisies est/sont vide !");
			}else if(echo == "mdp"){
				alert("Les mots de passe ne sont pas identiques");
			}else if(echo == "mail") {
				alert("E-mail déja utilisée ou pas valide");
			}else if(echo == "pseudo"){
				alert("Pseudo déja utilisée");
			}else if(echo == "ok"){
				alert("Votre compte a etais crée avec succée ! Vous allez etre redérgier vers la page de connexion");
				window.location = "connexion.html";
			}else{
				alert(echo);
			}
			
			
       },

       error : function(resultat, statut, erreur){
       	console.log(resultat, statut, erreur);
       },

       complete : function(resultat, statut){
       		console.log(resultat, statut);
       }

	
		});
	});






});