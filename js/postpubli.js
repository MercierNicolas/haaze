$(document).ready(function(){
post();
$("#actualiser").click(function(){
 $("#affichage > div").remove();
 post()
});
function post(){    
  $.ajax({
            type : "POST",
            url : "php/postpubli.php",

            data :  "contenus=actualisation",
            dataType : 'html',

        success : function(echo){
           var tableau = jQuery.parseJSON(echo)
           var count = 0;
           //Calcule taile tableau
           for(var keys in tableau){
              if (tableau.hasOwnProperty(keys)){
                count ++;
              }
           }
          for (var i = 0; i < count; i++) {
            var publi=tableau[i].iDpubli
            
             $("#affichage").prepend("<div class=box>"+
           "<div class=nom>"+
           tableau[i].Nom +" "+tableau[i].Prenom + " Publié le : "+ tableau[i].datePubli +
           "</div>"/*fin div nom */+
           "<div class=contenus>"+tableau[i].contenus+"</div>"/*fin div contenus*/+
           "<div class=note id="+tableau[i].iDpubli+"><img src=img/logo_1.png alt=icon note class=publ-icon data-index=1><img src=img/logo_1.png alt=icon note class=publ-icon data-index=2><img src=img/logo_1.png alt=icon note class=publ-icon data-index=3><img src=img/logo_1.png alt=icon note class=publ-icon data-index=4><img src=img/logo_1.png alt=icon note class=publ-icon data-index=5></div>"+
            "</div>"/*fin div publication*/)


           /* Parti css */
           $(".box").css({
            "display": "flex",
            "flex-direction": "column",
            "align-items": "center",
            "justify-content": "space-between"

           });
           $(".publ-icon").css({
            "height": "30px",
            "background": "#fff",
            "margin":"1px"
           });

          note();

          function note(){
          var vote = false;
          var iDpubli2="#"+tableau[i].iDpubli;
          
          $(iDpubli2).children().click(function(){

          var note = $(this).data('index');
          
            
            var ratedIndex = -1, uID = 0;


                

            if (localStorage.getItem('ratedIndex') != null) {
                setStars();
                uID = localStorage.getItem('uID');
            }

            $(iDpubli2).children().on('click', function () {
               ratedIndex = parseInt($(this).data('index'));
               localStorage.setItem('ratedIndex', ratedIndex);
               
            });
        
        function setStars(max) {
            if (vote == false) {
              $(iDpubli2).append("<p> Vous avez voté "+note+" / 5 ! </p>");
              vote = true;
              envoyeBDD();
            }         
        }//Fin setStars

          function envoyeBDD(){
            $.ajax({
              type : "POST",
              url : "php/note.php",

              data :  "note="+note+"&publi="+$(iDpubli2).attr("id"),
              dataType : 'html',

              success : function(echo){
                if (echo == "dvote") {
                  $(iDpubli2).empty()
                  $(iDpubli2).append("<p> Vous avez déja voté sur ce post ! </p>");
                }
              }
             })
          }

          });
          };// Fin fonction note











          }
      



       },

       error : function(resultat, statut, erreur){
           alert("erreur");
       },


        });// Fin ajax

};//fin function post


});
