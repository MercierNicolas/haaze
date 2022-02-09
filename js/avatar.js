$(document).ready(function(){
	$("#1").click(function(){
		var photo = $("#1").attr("id")
		envoieAvatar(photo);
	});
	$("#2").click(function(){
		var photo = $("#2").attr("id")
		envoieAvatar(photo);
	});
	$("#3").click(function(){
		var photo = $("#3").attr("id")
		envoieAvatar(photo);
	});
	$("#4").click(function(){
		var photo = $("#4").attr("id")
		envoieAvatar(photo);
	});
	$("#5").click(function(){
		var photo = $("#5").attr("id")
		envoieAvatar(photo);
	});
	$("#6").click(function(){
		var photo = $("#6").attr("id")
		envoieAvatar(photo);
	});
function envoieAvatar(photo){
		$.ajax({
			type : "POST",
			url : "php/avatar.php",

			data :  "avatar="+photo,
			dataType : 'html',

		success : function(echo){
			window.location = "page_profil.php";
			
       },

       error : function(resultat, statut, erreur){
       	console.log(resultat, statut, erreur);
       },

       complete : function(resultat, statut){
       		console.log(resultat, statut);
       }

	
		});
}
});