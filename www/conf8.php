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
echo '
<head><link rel="stylesheet" href="theme/form.css"></head>
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
<h2>LOG DE ARGENTINA</h2> ACTIVO
<input title="ENTRE si O no EN minuscula" type="text" name="activaarg" size="50" value="'.htmlspecialchars( $activaarg ).'" />
<br> USUARIO
<input title="SUELE SER EL MAIL" type="text" name="argenuser" size="50" value="'.htmlspecialchars( $argenuser ).'" />
<br> PASSWORD
<input title="PASSWORD?" type="password" name="argenpass" size="50" value="'.htmlspecialchars( $argenpass ).'" />
<br>
<br>
<input type="submit" name="submit">
</form>
';
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
        echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESANDO ESPERE</h2>';
        file_put_contents( 'C:\\phpdce\\usr\\variables.php', $str );
    } else {
        echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NO SE MODIFICO NADA</h2>';
    }
    header( "Refresh:5" );
}
?>