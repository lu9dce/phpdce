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
$hmilicencia = htmlspecialchars( $milicencia );
$hmiemail = htmlspecialchars( $miemail );
$hminombre = htmlspecialchars( $minombre );
$hmiqth = htmlspecialchars( $miqth );
$hmigrid = htmlspecialchars( $migrid );
$hdxcomen = htmlspecialchars( $dxcomen );
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
            <h2>DATOS DEL USUARIO (complementarios)</h2> LICENCIA
            <input title="SU LICENCIA EN MAYUSCULA" type="text" name="milicencia" size="50" value="'.$hmilicencia.'" />
            <br> EMAIL
            <input title="MAIL USADO PARA LA IMAGEN QSL" type="text" name="miemail" size="50" value="'.$hmiemail.'" />
            <br> NOMBRE
            <input title="SU NOMBRE Y APELLIDO" type="text" name="minombre" size="50" value="'.$hminombre.'" />
            <br> QTH
            <input title="SU QTH (EJ BUENOS AIRES - ARGENTINA)" type="text" name="miqth" size="50" value="'.$hmiqth.'" />
            <br> LOCATOR
            <input title="LOCADOR" type="text" name="migrid" size="50" value="'.$hmiqth.'" />
            <br> COMENTARIO
            <input title="COMENTARIO PARA COMPLETAR EL QSO" type="text" name="dxcomen" size="50" value="'.$hdxcomen.'" />
            <br>
            <br>
            <input type="submit" name="submit">
        </form>
';
if ( isset( $_POST['milicencia'] ) ) {
    $data1 = $_POST['milicencia'];
    $data2 = $_POST['miemail'];
    $data3 = $_POST['minombre'];
    $data4 = $_POST['miqth'];
    $data5 = $_POST['migrid'];
    $data6 = $_POST['dxcomen'];
    $str = file_get_contents( 'C:\\phpdce\\usr\\variables.php' );
    $oldContent = '$milicencia = "'.$milicencia.'";';
    $newContent = '$milicencia = "'.$data1.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$miemail = "'.$miemail.'";';
    $newContent = '$miemail = "'.$data2.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$minombre = "'.$minombre.'";';
    $newContent = '$minombre = "'.$data3.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$miqth = "'.$miqth.'";';
    $newContent = '$miqth = "'.$data4.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$migrid = "'.$migrid.'";';
    $newContent = '$migrid = "'.$data5.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$dxcomen = "'.$dxcomen.'";';
    $newContent = '$dxcomen = "'.$data6.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    if ( ( $milicencia != $data1 ) || ( $miemail != $data2 ) || ( $minombre != $data3 ) || ( $miqth != $data4 ) || ( $migrid != $data5 ) || ( $dxcomen != $data6 ) ) {
        echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESANDO ESPERE</h2>';
        file_put_contents( 'C:\\phpdce\\usr\\variables.php', $str );
    } else {
        echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NO SE MODIFICO NADA</h2>';
    }
    header( "Refresh:5" );
}
?>