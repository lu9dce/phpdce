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
echo '<h2>CLUB LOG</h2>';
echo 'ACTIVO <input title="ENTRE si O no EN minuscula" type="text" name="activaclub" size="50" value="'.htmlspecialchars( $activaclub ).'" /><br>';
echo 'USUARIO <input title="SU USUARIO" type="text" name="clubuser" size="50" value="'.htmlspecialchars( $clubuser ).'" /><br>';
echo 'MAIL <input title="EMAIL DE REGISTRO DE CLUBLOG" type="text" name="clubmail" size="50" value="'.htmlspecialchars( $clubmail ).'" /><br>';
echo 'PASSWORD <input title="PASSWORD?" type="password" name="clubpass" size="50" value="'.htmlspecialchars( $clubpass ).'" /><br>';
echo '<br><input type="submit" name="submit"></form>';
if ( isset( $_POST['activaclub'] ) ) {
    $data1 = $_POST['activaclub'];
    $data2 = $_POST['clubuser'];
    $data3 = $_POST['clubmail'];
    $data4 = $_POST['clubpass'];
    $str = file_get_contents( 'C:\\phpdce\\usr\\variables.php' );
    $oldContent = '$activaclub = "'.$activaclub.'";';
    $newContent = '$activaclub = "'.$data1.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$clubuser = "'.$clubuser.'";';
    $newContent = '$clubuser = "'.$data2.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$clubmail = "'.$clubmail.'";';
    $newContent = '$clubmail = "'.$data3.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$clubpass = "'.$clubpass.'";';
    $newContent = '$clubpass = "'.$data4.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    if ( ( $activaclub != $data1 ) || ( $clubuser != $data2 ) || ( $clubmail != $data3 ) || ( $clubpass != $data4 ) ) {
        echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESANDO ESPERE</h2>';
        file_put_contents( 'C:\\phpdce\\usr\\variables.php', $str );
    } else {
        echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NO SE MODIFICO NADA</h2>';
    }
    header( "Refresh:5" );
}
?>