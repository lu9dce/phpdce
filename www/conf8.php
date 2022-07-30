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
echo '<h2>LOG ARGENTINA</h2>';
echo 'ACTIVE <input title="ENTER yes OR no IN lowercase" type="text" name="activaarg" size="50" value="'.htmlspecialchars( $activaarg ).'" /><br>';
echo 'USER <input title="IT IS USUALLY THE EMAIL" type="text" name="argenuser" size="50" value="'.htmlspecialchars( $argenuser ).'" /><br>';
echo 'PASSWORD <input title="PASSWORD?" type="password" name="argenpass" size="50" value="'.htmlspecialchars( $argenpass ).'" /><br>';
echo '<br><input type="submit" name="submit"></form>';
if ( isset( $_POST['activaarg'] ) ) {
    $data1 = $_POST['activaarg'];
    $data2 = $_POST['argenuser'];
    $data3 = $_POST['argenpass'];
    $str = file_get_contents( 'C:\\phpdce\\usr\\variables.php' );
    $oldContent = '$activaarg = "'.$activaarg.'";';
    $newContent = '$activaarg = "'.$data1.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$argenuser = "'.$argenuser.'";';
    $newContent = '$argenuser = "'.$data2.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$argenpass = "'.$argenpass.'";';
    $newContent = '$argenpass = "'.$data3.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    if ( ( $activaarg != $data1 ) || ( $argenuser != $data2 ) || ( $argenpass != $data3 ) ) {
        echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESSING PLEASE WAIT</h2>';
        file_put_contents( 'C:\\phpdce\\usr\\variables.php', $str );
    } else {
        echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NOTHING IS MODIFIED</h2>';
    }
    header( "Refresh:5" );
}
?>