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
echo '<h2>APRS</h2>';
echo 'ACTIVO <input title="ENTRE si O no EN minuscula" type="text" name="activaaprs" size="50" value="'.htmlspecialchars( $activaaprs ).'" /><br>';
echo 'CORDENADAS <input title="EJ 3428.20S/05845.35W" type="text" name="aprsqth" size="50" value="'.htmlspecialchars( $aprsqth ).'" /><br>';
echo 'PASSCODE <input title="EL PASSCODE DE APRS" type="password" name="aprscode" size="50" value="'.htmlspecialchars( $aprscode ).'" /><br>';
echo '<br><input type="submit" name="submit"></form>';
if ( isset( $_POST['activaaprs'] ) ) {
    $data1 = $_POST['activaaprs'];
    $data2 = $_POST['aprsqth'];
    $data3 = $_POST['aprscode'];
    $str = file_get_contents( 'C:\\phpdce\\usr\\variables.php' );
    $oldContent = '$activaaprs = "'.$activaaprs.'";';
    $newContent = '$activaaprs = "'.$data1.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$aprsqth = "'.$aprsqth.'";';
    $newContent = '$aprsqth = "'.$data2.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$aprscode = "'.$aprscode.'";';
    $newContent = '$aprscode = "'.$data3.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    if ( ( $activaaprs != $data1 ) || ( $aprsqth != $data2 ) || ( $aprscode != $data3 ) ) {
        echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESANDO ESPERE</h2>';
        file_put_contents( 'C:\\phpdce\\usr\\variables.php', $str );
    } else {
        echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NO SE MODIFICO NADA</h2>';
    }
    header( "Refresh:5" );
}
?>