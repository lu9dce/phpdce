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
echo '<h2>HAMQTH</h2>';
echo 'ACTIVE <input title="ENTER yes OR no IN lowercase" type="text" name="activaqth" size="50" value="'.htmlspecialchars( $activaqth ).'" /><br>';
echo 'USER <input title="IT IS USUALLY YOUR LICENSE" type="text" name="hamuser" size="50" value="'.htmlspecialchars( $hamuser ).'" /><br>';
echo 'PASSWORD <input title="PASSWORD?" type="password" name="hampass" size="50" value="'.htmlspecialchars( $hampass ).'" /><br>';
echo '<br><input type="submit" name="submit">';
if ( isset( $_POST['activaqth'] ) ) {
    $data1 = $_POST['activaqth'];
    $data2 = $_POST['hamuser'];
    $data3 = $_POST['hampass'];
    $str = file_get_contents( 'C:\\phpdce\\usr\\variables.php' );
    $oldContent = '$activaqth = "'.$activaqth.'";';
    $newContent = '$activaqth = "'.$data1.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$hamuser = "'.$hamuser.'";';
    $newContent = '$hamuser = "'.$data2.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$hampass = "'.$hampass.'";';
    $newContent = '$hampass = "'.$data3.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    if ( ( $activaqth != $data1 ) || ( $hamuser != $data2 ) || ( $hampass != $data3 ) ) {
        echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESSING PLEASE WAIT</h2>';
        file_put_contents( 'C:\\phpdce\\usr\\variables.php', $str );
    } else {
        echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NOTHING IS MODIFIED</h2>';
    }
    header( "Refresh:5" );
}
?>