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
$hactivaclub = htmlspecialchars( $activaclub );
$hclubuser = htmlspecialchars( $clubuser );
$hclubmail = htmlspecialchars( $clubmail );
$hclubpass = htmlspecialchars( $clubpass );
echo '
    <head>
        <link rel="stylesheet" href="theme/form.css">
    </head>
        <a href="conf1.php" target="_self">datos</a>
        <a href="conf2.php" target="_self">adi</a>
        <a href="conf3.php" target="_self">cluster</a>
        <a href="conf4.php" target="_self">eqsl</a>
        <a href="conf5.php" target="_self">aprs</a>
        <a href="conf6.php" target="_self">clublog</a>
        <a href="conf7.php" target="_self">hdrlog</a>
        <a href="conf8.php" target="_self">arglog</a>
        <a href="conf9.php" target="_self">qrz</a>
        <a href="conf10.php" target="_self">hamqth</a>
        <a href="conf11.php" target="_self">lotw</a>
        <a href="conf12.php" target="_self">mail</a>
        <a href="conf13.php" target="_self">motor</a>
        <br>
        <form method="post">
            <h2>CLUB LOG</h2> ACTIVO
            <input title="ENTRE si O no EN minuscula" type="text" name="activaclub" size="50" value="'.$hactivaclub.'" />
            <br> USUARIO
            <input title="SU USUARIO" type="text" name="clubuser" size="50" value="'.$hclubuser.'" />
            <br> MAIL
            <input title="EMAIL DE REGISTRO DE CLUBLOG" type="text" name="clubmail" size="50" value="'.$hclubmail.'" />
            <br> PASSWORD
            <input title="PASSWORD?" type="password" name="clubpass" size="50" value="'.$hclubpass.'" />
            <br>
            <br>
            <input type="submit" name="submit">
        </form>
';
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