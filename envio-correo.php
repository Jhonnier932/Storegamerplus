<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; 
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 0;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "storegamerplus@gmail.com";
$mail->Password   = "store1234";

$mail->IsHTML(true);
$mail->AddAddress("storegamerplus@gmail.com", "ventas store");
$mail->SetFrom("storegamerplus@gmail.com", $_POST['contact-name']);
$mail->AddReplyTo($_POST['contact-email'],$_POST['contact-name']);
$mail->Subject = 'Enviado por '.$_POST['contact-name'];
$content = ' <font size="4px">Correo enviado desde el formulario de contacto
    <br> <br>
    <font size="4px"><b>Nombre:</b></font> <font size="4px">'.$_POST['contact-name'].'</font>
    <br>
    <font size="4px"><b>Email: </b></font> <font size="4px">'.$_POST['contact-email'].'</font>
    <br>
    <font size="4px"><b>Telefono: </b></font> <font size="4px">'.$_POST['contact-telefono'].'</font>
    <br>
    <font size="4px"><b>Mensaje: </b></font> <font size="4px">'.$_POST['contact-mensaje'].'</font>';

$mail->MsgHTML($content); 
if(!$mail->Send()) { 
 echo "<meta http-equiv=\"refresh\" content=\"0;URL=#\">";
  var_dump($mail);
} else {
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=gracias.html\">";
}

?>

