$(document).ready(function(){
    $("#bouton").click(function(){
        $.ajax({
            type : "POST",
            url : "php/publi.php",

            data :  "contenus="+$("#publier").val(),
            dataType : 'html',

        success : function(echo){
          if (echo == "champs_vide") {

          }else{
           var tableau = jQuery.parseJSON(echo)
           $("#affichage").prepend("<div class=box publication>" +
           "<div class=nom>"+
           tableau.nom +" "+tableau.prenom + " Publié le : "+ tableau.datePubli +
           "</div>"/*fin div nom */+
           "<div class=content><p>"+tableau.contenus+"</p></div>"/*fin div contenus*/+
        
            "</div>"/*fin div publication*/)


           /* Parti css */
           $(".box").css({
            "display": "flex",
            "flex-direction": "column",
            "align-items": "center",
            "justify-content": "space-between"

           });
            $(".publ-icon").css({
            "height": "30px"
           });
          }
       },

       error : function(resultat, statut, erreur){
           console.log(resultat, statut, erreur);
       },

       complete : function(resultat, statut){
               console.log(resultat, statut);
       }
        });// Fin ajax
        $("#publier").val("");
    });

});
