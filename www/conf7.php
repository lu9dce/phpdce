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
echo '<h2>HDRLOG</h2>';
echo 'ACTIVO <input title="ENTRE si O no EN minuscula" type="text" name="activahdr" size="50" value="'.htmlspecialchars( $activahdr ).'" /><br>';
echo 'USUARIO <input title="USUARIO DE HDRLOG" type="text" name="hdruser" size="50" value="'.htmlspecialchars( $hdruser ).'" /><br>';
echo 'CODIGO <input title="SU CODIGO (NO PASSWORD)" type="password" name="hdrcode" size="50" value="'.htmlspecialchars( $hdrcode ).'" /><br>';
echo '<br><input type="submit" name="submit"></form>';
if ( isset( $_POST['activahdr'] ) ) {
    $data1 = $_POST['activahdr'];
    $data2 = $_POST['hdruser'];
    $data3 = $_POST['hdrcode'];
    $str = file_get_contents( 'C:\\phpdce\\usr\\variables.php' );
    $oldContent = '$activahdr = "'.$activahdr.'";';
    $newContent = '$activahdr = "'.$data1.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$hdruser = "'.$hdruser.'";';
    $newContent = '$hdruser = "'.$data2.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$hdrcode = "'.$hdrcode.'";';
    $newContent = '$hdrcode = "'.$data3.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    if ( ( $activahdr != $data1 ) || ( $hdruser != $data2 ) || ( $hdrcode != $data3 ) ) {
        echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESANDO ESPERE</h2>';
        file_put_contents( 'C:\\phpdce\\usr\\variables.php', $str );
    } else {
        echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NO SE MODIFICO NADA</h2>';
    }
    header( "Refresh:5" );
}
?>