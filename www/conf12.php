<?php
/***********************************
* CREADO POR LU9DCE
* Copyright 2022 Eduardo Castillo
* castilloeduardo@outlook.com
* GNU AFFERO GENERAL PUBLIC LICENSE
* Version 3, 19 November 2007
***********************************/
// .-.. ..- ----. -.. -.-. .
include 'C:\\phpdce\\usr\\variables.php';
include 'C:\\phpdce\\www\\confx.php';
echo '<form method="post">';
echo '<h2>MAIL Y QSL</h2>';
echo 'ACTIVO <input title="ENTRE si O no EN minuscula" type="text" name="sendmail" size="50" value="'.htmlspecialchars( $sendmail ).'" /><br>';
echo 'FONDO QSL <input title="RUTA COMPLETA O URL CON JPG&#10;(escribe azar para fondos ramdon)" type="text" name="fondo" size="50" value="'.htmlspecialchars( $fondo ).'" /><br>';
echo 'SMTP <input title="DATOS DE SU SMTP (ATENCION SE RECOMIENDA QUE USE GMX.COM)" type="text" name="usemail" size="50" value="'.htmlspecialchars( $usemail ).'" /><br>';
echo 'USUARIO <input title="USUARIO?" type="text" name="useuser" size="50" value="'.htmlspecialchars( $useuser ).'" /><br>';
echo 'PASSWORD <input title="PASSWORD?" type="password" name="usepass" size="50" value="'.htmlspecialchars( $usepass ).'" /><br>';
echo 'COMENTARIO <input title="PARA LA QSL" type="text" name="dxcomen" size="50" value="'.htmlspecialchars( $dxcomen ).'" /><br>';
echo '<br><input type="submit" name="submit"></form>';
if ( isset( $_POST['sendmail'] ) ) {
    $data1 = $_POST['sendmail'];
    $data2 = $_POST['usemail'];
    $data3 = $_POST['useuser'];
    $data4 = $_POST['usepass'];
    $data5 = $_POST['fondo'];
    $data5 = explode ( "\\", $data5 );
    $data5 = implode ( '\\\\', $data5 );
    $fondo = explode ( "\\", $fondo );
    $fondo = implode ( '\\\\', $fondo );
    $str = file_get_contents( 'C:\\phpdce\\usr\\variables.php' );
    $oldContent = '$fondo = "'.$fondo.'";';
    $newContent = '$fondo = "'.$data5.'";';
    $str = str_replace( $oldContent, $newContent, $str );

    $oldContent = '$sendmail = "'.$sendmail.'";';
    $newContent = '$sendmail = "'.$data1.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$usemail = "'.$usemail.'";';
    $newContent = '$usemail = "'.$data2.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$useuser = "'.$useuser.'";';
    $newContent = '$useuser = "'.$data3.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$usepass = "'.$usepass.'";';
    $newContent = '$usepass = "'.$data4.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    if ( ( $sendmail != $data1 ) || ( $usemail != $data2 ) || ( $useuser != $data3 ) || ( $usepass != $data4 ) || ( $fondo != $data5 ) ) {
        echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESANDO ESPERE</h2>';
        file_put_contents( 'C:\\phpdce\\usr\\variables.php', $str );
    } else {
        echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NO SE MODIFICO NADA</h2>';
    }
    header( "Refresh:5" );
}
?>