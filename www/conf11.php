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
echo '<h2>LOTW</h2>';
echo 'ACTIVO <input title="ENTRE si O no EN minuscula (INSTALE TQSL)" type="text" name="activalotw" size="50" value="'.htmlspecialchars( $activalotw ).'" /><br>';
echo '<br><input type="submit" name="submit"></form>';
if ( isset( $_POST['activalotw'] ) ) {
    $data1 = $_POST['activalotw'];
    $str = file_get_contents( 'C:\\phpdce\\usr\\variables.php' );
    $oldContent = '$activalotw = "'.$activalotw.'";';
    $newContent = '$activalotw = "'.$data1.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    if ( $activalotw != $data1 ) {
        echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESANDO ESPERE</h2>';
        file_put_contents( 'C:\\phpdce\\usr\\variables.php', $str );
    } else {
        echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NO SE MODIFICO NADA</h2>';
    }
    header( "Refresh:5" );
}
?>