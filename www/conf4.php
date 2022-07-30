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
echo '<h2>EQSL</h2>';
echo 'ACTIVE <input title="ENTER yes OR no IN lowercase" type="text" name="activaeqsl" size="50" value="'.htmlspecialchars( $activaeqsl ).'" /><br>';
echo 'USER <input title="YOUR EQSL USER" type="text" name="eqsluser" size="50" value="'.htmlspecialchars( $eqsluser ).'" /><br>';
echo 'PASSWORD <input title="PASSWORD?" type="password" name="eqslpass" size="50" value="'.htmlspecialchars( $eqslpass ).'" /><br>';
echo '<br><input type="submit" name="submit"></form>';
if ( isset( $_POST['activaeqsl'] ) ) {
    $data1 = $_POST['activaeqsl'];
    $data2 = $_POST['eqsluser'];
    $data3 = $_POST['eqslpass'];
    $str = file_get_contents( 'C:\\phpdce\\usr\\variables.php' );
    $oldContent = '$activaeqsl = "'.$activaeqsl.'";';
    $newContent = '$activaeqsl = "'.$data1.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$eqsluser = "'.$eqsluser.'";';
    $newContent = '$eqsluser = "'.$data2.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$eqslpass = "'.$eqslpass.'";';
    $newContent = '$eqslpass = "'.$data3.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    if ( ( $activaeqsl != $data1 ) || ( $eqsluser != $data2 ) || ( $eqslpass != $data3 ) ) {
        echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESSING PLEASE WAIT</h2>';
        file_put_contents( 'C:\\phpdce\\usr\\variables.php', $str );
    } else {
        echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NOTHING IS MODIFIED</h2>';
    }
    header( "Refresh:5" );
}
?>