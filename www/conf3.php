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
<h2>DATOS DEL CLUSTER</h2> ACTIVO
<input title="ENTRE si O no EN minuscula" type="text" name="activacluster" size="50" value="'.htmlspecialchars( $activacluster ).'" />
<br> IP
<input title="DIRECCION O IP DEL CLUSTER QUE USA (TELNET)" type="text" name="clustertelnet" size="50" value="'.htmlspecialchars( $clustertelnet ).'" />
<br> PUERTO
<input title="PUERTO TELNET" type="text" name="clusterport" size="50" value="'.htmlspecialchars( $clusterport ).'" />
<br>
<br>
<input type="submit" name="submit">
</form>
';
if ( isset( $_POST['activacluster'] ) ) {
    $data1 = $_POST['activacluster'];
    $data2 = $_POST['clustertelnet'];
    $data3 = $_POST['clusterport'];
    $str = file_get_contents( 'C:\\phpdce\\usr\\variables.php' );
    $oldContent = '$activacluster = "'.$activacluster.'";';
    $newContent = '$activacluster = "'.$data1.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$clustertelnet = "'.$clustertelnet.'";';
    $newContent = '$clustertelnet = "'.$data2.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$clusterport = "'.$clusterport.'";';
    $newContent = '$clusterport = "'.$data3.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    if ( ( $activacluster != $data1 ) || ( $clustertelnet != $data2 ) || ( $clusterport != $data3 ) ) {
        echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESANDO ESPERE</h2>';
        file_put_contents( 'C:\\phpdce\\usr\\variables.php', $str );
    } else {
        echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NO SE MODIFICO NADA</h2>';
    }
    header( "Refresh:5" );
}
?>