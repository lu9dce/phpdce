<?php
/***********************************
* CREADO POR LU9DCE
* Copyright 2022 Eduardo Castillo
* castilloeduardo@outlook.com
* GNU AFFERO GENERAL PUBLIC LICENSE
* Version 3, 19 November 2007
***********************************/
// .-.. ..- ----. -.. -.-. . 
// hora del sistema a utc
date_default_timezone_set( 'UTC' );
// prepara el sistema smtp
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'C:\\phpdce\\modulos\\PHPMailer\\src\\Exception.php';
require 'C:\\phpdce\\modulos\\PHPMailer\\src\\PHPMailer.php';
require 'C:\\phpdce\\modulos\\PHPMailer\\src\\SMTP.php';
// busqueda por qrz activa?
if ( $fqrz == "si" ) {
    $qrx = "https://xmldata.qrz.com/xml/current/?username=$qrzuser;password=$qrzpass;callsign=$call";
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $qrx );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
    $xml = curl_exec( $ch );
    curl_close( $ch );
    $xml = simplexml_load_string( $xml );
    $malmail = $xml->Callsign->email;
    $malname = $xml->Callsign->fname;
}
// busqueda por hamqth activa?
if ( $fhamqth == "si" ) {
    include $dirt.'modulos\\busq.php';
    rename( $dirt.'tmp\\xusq.xml', $dirt.'tmp\\hamail.xml' );
    $xml = simplexml_load_file( $dirt.'tmp\\hamail.xml' );
    $malmail = $xml->search->email;
    $malname = $xml->search->nick;
}
// si exite una direccion de mail crea qsl y envia
if ( strlen( $malmail ) != "0" ) {
    include $dirt.'modulos\\qsl.php';
    $cuerpo = "<br>
Envio automatico via PHPDCE https://github.com/lu9dce/phpdce<br>
---------------------------------------------------------------------<br>
<br>
Dear<br>
Thank you for our contact:<br>
<br>
Date : $qso_date - $time_on<br>
Freq : $freq<br>
Band : $band<br>
Mode : $mode<br>
RST  : $rst_sent<br>
RCV  : $rst_rcvd<br>
<br>
Please find attached my QSL card<br>
Best Regards and 73<br>
<br>
$minombre - $milicencia<br>
<br>
My QRZ https://www.qrz.com/db/$milicencia<br>
<br>
https://hamsignal.net/$milicencia<br>
<br>
---------------------------------------------------------------------<br>
                        PHPDCE - created by Eduardo Castillo (LU9DCE)<br>
<br>";
    $mail = new PHPMailer( true );
    try {
        //Server settings
        $mail->SMTPDebug  = 0;
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        //Enable verbose debug output
        $mail->isSMTP();
        //Send using SMTP
        $mail->Host       = $usemail;
        //Set the SMTP server to send through
        $mail->SMTPAuth   = true;
        //Enable SMTP authentication
        $mail->Username   = $useuser;
        //SMTP username
        $mail->Password   = $usepass;
        //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        //Enable implicit TLS encryption
        $mail->SMTPSecure = 'tls';
        //Use TLS
        $mail->Port       = $useport;
        //TCP port to connect to;
        //use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom( $useuser, $milicencia );
        //Tu Mail
        $mail->addAddress( $malmail );
        //Adonde Va
        //$mail->addReplyTo( 'lu9dce@gmx.com', 'lu9dce' );
        //Replica opcional
        //Attachments
        $mail->addAttachment( $dirt.'tmp\\qsl.jpg' );
        //Add attachments
        //Content
        $mail->isHTML( true );
        //Set email format to HTML
        $mail->Subject = 'Hi! '.$call.' thanks for the qso';
        $mail->Body    = $cuerpo;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        //echo 'Message has been sent';
    } catch ( Exception $e ) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    //unlink( $dirt.'tmp\\qsl.jpg' );
    // guarda un log
    $result = "1";
    file_put_contents( $dirt.'log\\mail.txt', $result );
} else {
    $result = "0";
    file_put_contents( $dirt.'log\\mail.txt', $result );
}
?>