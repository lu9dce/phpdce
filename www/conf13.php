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
echo '<h2>SEARCH QSO DATA CHOOSE ONLY ONE</h2>';
echo 'HAMQTH <input title="ENTER yes OR no IN lowercase (FREE)" type="text" name="fhamqth" size="50" value="'.htmlspecialchars( $fhamqth ).'" /><br>';
echo 'QRZ <input title="ENTER yes OR no IN lowercase (PAY)" type="text" name="fqrz" size="50" value="'.htmlspecialchars( $fqrz ).'" /><br>';
echo '<br><input type="submit" name="submit">';
if ( isset( $_POST['fhamqth'] ) ) {
    $data1 = $_POST['fhamqth'];
    $data2 = $_POST['fqrz'];
    $str = file_get_contents( 'C:\\phpdce\\usr\\variables.php' );
    $oldContent = '$fhamqth = "'.$fhamqth.'";';
    $newContent = '$fhamqth = "'.$data1.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$fqrz = "'.$fqrz.'";';
    $newContent = '$fqrz = "'.$data2.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    if ( ( $fhamqth != $data1 ) || ( $fqrz != $data2 ) ) {
        echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESSING PLEASE WAIT</h2>';
        file_put_contents( 'C:\\phpdce\\usr\\variables.php', $str );
    } else {
        echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NOTHING IS MODIFIED</h2>';
    }
    header( "Refresh:5" );
}
?>