$(document).ready(function(){
    $("#bouton").click(function(){
        $.ajax({
            type : "POST",
            url : "php/publi.php",

            data :  "contenus="+$("#publier").val(),
            dataType : 'html',

        success : function(echo){
           // alert(echo);
           var tableau = jQuery.parseJSON(echo)
           $("#affichage").prepend("<div class=publication>" +
           "<div class=nom>"+
           tableau.nom +" "+tableau.prenom +
           "</div>"/*fin div nom */+
           "<div class=contenus>"+tableau.contenus+"</div>"/*fin div contenus*/+
           "<div class=note> </div>"+
            "</div>"/*fin div publication*/)


           /* Parti css */
           $(".publication").css({
            "border": "2px solid black",
            "width": "auto",
            "margin": "5px",
            "border-radius": "15px"

           });
          $(".nom").css({
            "display": "inline-block",
            "border-radius": "15px",
            "background-color": "red",
            "padding": "2px"
           });          
           $(".contenus").css({
            "margin": "2px",
            "padding": "2px",
            "background-color": "blue",
            "border-radius": "15px"

           });
          $(".note").css({
            "margin": "2px",
            "background-color": "yellow",
            "height": "25px",
            "border-radius":"15px"
           });
          

           console.log(tableau);


       },

       error : function(resultat, statut, erreur){
           console.log(resultat, statut, erreur);
       },

       complete : function(resultat, statut){
               console.log(resultat, statut);
       }
        });// Fin ajax
    });
});
