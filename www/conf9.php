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
echo '<h2>QRZ.COM</h2>';
echo 'ACTIVO <input title="ENTRE si O no EN minuscula" type="text" name="activaqrz" size="50" value="'.htmlspecialchars( $activaqrz ).'" /><br>';
echo 'USUARIO <input title="SUELE SER SU LICENCIA" type="text" name="qrzuser" size="50" value="'.htmlspecialchars( $qrzuser ).'" /><br>';
echo 'PASSWORD <input title="PASSWORD?" type="password" name="qrzpass" size="50" value="'.htmlspecialchars( $qrzpass ).'" /><br>';
echo 'KEY <input title="KEY SOLO LO DAN A CUENTAS PAGAS" type="text" name="qrzkey" size="50" value="'.htmlspecialchars( $qrzkey ).'" /><br>';
echo '<br><input type="submit" name="submit"></form>';
if ( isset( $_POST['activaqrz'] ) ) {
    $data1 = $_POST['activaqrz'];
    $data2 = $_POST['qrzuser'];
    $data3 = $_POST['qrzpass'];
    $data4 = $_POST['qrzkey'];
    $str = file_get_contents( 'C:\\phpdce\\usr\\variables.php' );
    $oldContent = '$activaqrz = "'.$activaqrz.'";';
    $newContent = '$activaqrz = "'.$data1.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$qrzuser = "'.$qrzuser.'";';
    $newContent = '$qrzuser = "'.$data2.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$qrzpass = "'.$qrzpass.'";';
    $newContent = '$qrzpass = "'.$data3.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$qrzkey = "'.$qrzkey.'";';
    $newContent = '$qrzkey = "'.$data4.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    if ( ( $activaqrz != $data1 ) || ( $qrzuser != $data2 ) || ( $qrzpass != $data3 ) || ( $qrzkey != $data4 ) ) {
        echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESANDO ESPERE</h2>';
        file_put_contents( 'C:\\phpdce\\usr\\variables.php', $str );
    } else {
        echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NO SE MODIFICO NADA</h2>';
    }
    header( "Refresh:5" );
}
?>