<?php

$email = $_POST['email_correct'];

if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email = $_POST['email_correct'];
    $assunto = 'Novo mensagem do site!';
    $corpo = '<h2>E-mail recebido<h2>';
    $info = array('assunto'=>$assunto,'corpo'=>$corpo);
    $mail = new Email('smtp.gmail.com', 'mdfconnection@gmail.com', 'znekbkdkshnikiuq', 'Chaves');
    $mail->addAdress('matheussilvachaves19@gmail.com', 'Matheus');
    $mail->formatarEmail($info);
    $mail->enviarEmail();
    print("<h3 style='color:white;'>E-mail enviado com sucesso</h3>");	
 }else{
     print(
 "<div class='erro-email'>
      <h3>E-mail inválido</h3>
     </div>");
 }

 
