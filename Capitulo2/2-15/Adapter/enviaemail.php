<?php

require('PHPMailer/PHPMailerAutoload.php');
require('class/PHPMailerAdapter.php');

$mail = new PHPMailerAdapter();
$mail->setUseSmtp();
$mail->setSmtpHost('smtp.gmail.com',465);
$mail->setSmtpUser('jeyzielgato@gmail.com','josemanoel');
$mail->setFrom('jeyzielgato@gmail.com','jeyziel');
$mail->addAddress('jeyziel_21@hotmail.com','Destinatário');
$mail->setSubject('eae parceiro');
$mail->setHtmlBody('<b>ISSO É UM<i>TESTE</i></b>');

if($mail->send()){
    echo 'email enviado com sucesso';
}
else{
    echo 'falha ao enviar email';
}
