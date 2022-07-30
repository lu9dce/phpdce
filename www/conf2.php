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
echo '<h2>Ubicacion del ADI</h2>';
echo 'ADI <input title="MUY IMPORTATE! (EJ C:\Users\eduardo\AppData\Local\WSJT-X\wsjtx_log.adi)" type="text" name="adiwsjt" size="50" value="'.htmlspecialchars( $adiwsjt ).'" /><br>';
echo '<p>Nomalmente WSJT y JTDX estan en %localappdata%</p><br>';
echo '<input type="submit" name="submit"></form>';
if ( isset( $_POST['adiwsjt'] ) ) {
    $data1 = $_POST['adiwsjt'];
    $data1 = explode ( "\\", $data1 );
    $data1 = implode ( '\\\\', $data1 );
    $adiwsjt = explode ( "\\", $adiwsjt );
    $adiwsjt = implode ( '\\\\', $adiwsjt );
    $str = file_get_contents( 'C:\\phpdce\\usr\\variables.php' );
    $oldContent = '$adiwsjt = "'.$adiwsjt.'";';
    $newContent = '$adiwsjt = "'.$data1.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    if ( $adiwsjt != $data1 ) {
        echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESANDO ESPERE</h2>';
        file_put_contents( 'C:\\phpdce\\usr\\variables.php', $str );
    } else {
        echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NO SE MODIFICO NADA</h2>';
    }
    header( "Refresh:5" );
}
?>