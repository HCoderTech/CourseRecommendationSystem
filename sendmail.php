<?php

function email($to,$firstname,$subject,$body){
    require('PHPMailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPOptions = array (
    'ssl' => array (
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->SMTPKeepAlive = true;
$mail->Mailer = "smtp";
$mail->Username = "hewittvs@gmail.com";
$mail->Password = "hwttwhvs123";

//Set who the message is to be sent from
$mail->setFrom('admin@registoder.com', 'Admin@Courec.com');

//Set an alternative reply-to address
$mail->addReplyTo('hewittvs@gmail.com', 'Admin@Courec.com');

//Set who the message is to be sent to
$mail->addAddress($to,$firstname);

//Set the subject line
$mail->Subject = $subject;
$mail->Body = $body;
$mail->send();
}

?>