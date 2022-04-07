<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$nome  = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$mail = new PHPMailer(true);
try {
    //Server settings
  //  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com.br';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'suporte@ferramenta.top';                     //SMTP username
    $mail->Password   = 'Zapefire201700787@';                               //SMTP password
           //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	$mail->CharSet = 'UTF-8';
    //Recipients
    $mail->setFrom('suporte@ferramenta.top', 'Facilita');
    $mail->addAddress($email);               //Name is optional


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Seus dados de acesso!";
    $mail->Body    = '<div style="display:block;">
  
    <div style="position: absolute;margin-top:5%;width: 350px;padding: 15px;border:1px solid black;">
        <h2 style="text-align:center";>Olá,   '.$nome.' tudo bem?</h2>
        <h4 style="text-align:center";>Seus dados de acesso ao Facilita</h4>
        <strong>Email: '.$email.'</strong><br>
        <strong>Senha: '.$senha.'</strong>
     
    </div>
</div>';

    $mail->send();
    echo '1';
} catch (Exception $e) {
    echo "Erro: {$mail->ErrorInfo}";
}


?>