$(function(){

//Calling the function with click buttton    
 $('input[name=acao]').click(function(){

 var email =  $('input[name=email]').val();  

 $.ajax({
    url:include_path+'pages/enviar-email.php',
    type: "post",
    data:{
       email_correct: email,
    },

    beforeSend: function(){
       $('#btn-ajax').html("Enviando...");
    }

  }).done(function(e){
       $("#btn-ajax").html("Email Enviado com sucesso");

        });
       
        //will be sent to search screen
       setTimeout(function() {
         window.location = include_path+'pages/home.php';
       }, 3000)

         
  });

});   

    

