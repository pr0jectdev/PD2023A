
$(document).ready( function() {
    //console.log("okey");
    
    $('#btnSend').click(function() {
     //slideonlyone('sms_box')
       //console.log("teste de botao");
       
       var about = $('#about').val();
       var comment = $('#comment').val();
       //console.log("about zz: " + about);
       //console.log("comment zz: " + comment);

       $.ajax({
           url: "datainsertdynamo.php",
           type: "POST",
           data: {out_about:about, out_comment:comment},

       }).done(function(resposta) {
           console.log(resposta);

       }).fail(function(jqXHR, textStatus ) {
           console.log("Request failed: " + textStatus);

       }).always(function() {
           //console.log("completou");
       });
   });
});