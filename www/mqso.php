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
<form method="post">
<h2>QSO MANUAL</h2>
<table>
<tr>
<td>CALL
<input title="LICENCIA EN MAYUSCULA" type="text" name="call" placeholder="LU9DCE">
</td>
<td>GRIDSQUARE
<input title="LOCADOR EN MAYUSCULA" type="text" name="gridsquare" placeholder="GF05OM">
<br>
</td>
</tr>
<tr>
<td>MODE
<input title="EL MODO EN MAYUSCULA" type="text" name="mode" placeholder="FT8">
</td>
<td></td>
</tr>
<tr>
<td>RST_SENT
<input title="SEÑAL EN ENVIADA" type="text" name="rst_sent" placeholder="(-/+)10">
</td>
<td>RST_RCVD
<input title="SEÑAL EN RECIVIDA" type="text" name="rst_rcvd" placeholder="(-/+)10">
</td>
</tr>
<tr>
<td>BAND
<input title="BANDA CON LA m EN MINUSCULA AL FINAL" type="text" name="band" placeholder="10m">
</td>
<td>FREQ
<input title="FRECUENCIA NO OLVIDE EL PUNTO" type="text" name="freq" placeholder="28.074">
</td>
</tr>
</table>
COMMENT
<input title="COMENTARIO SI LO DESEA" type="text" name="comment" placeholder="TKX X QSO">
<br>
<br>
<input type="submit" name="submit">
</form>
';
date_default_timezone_set( 'UTC' );
if ( isset( $_POST['call'] ) ) {
    $data1 = $_POST['call'];
    $data2 = $_POST['gridsquare'];
    $data3 = $_POST['mode'];
    $data4 = $_POST['rst_sent'];
    $data5 = $_POST['rst_rcvd'];
    $data6 = $_POST['band'];
    $data7 = $_POST['freq'];
    $data8 = $_POST['comment'];
    $adi  = "<call:".strlen( $data1 ).">".$data1." ";
    $adi .= "<gridsquare:".strlen( $data2 ).">".$data2." ";
    $adi .= "<mode:".strlen( $data3 ).">".$data3." ";
    $adi .= "<rst_sent:".strlen( $data4 ).">".$data4." ";
    $adi .= "<rst_rcvd:".strlen( $data5 ).">".$data5." ";
    $da = date( "Ymd" );
    $adi .= "<qso_date:".strlen( $da ).">".$da." ";
    $ds = date( "His" );
    $adi .= "<time_on:".strlen( $ds ).">".$ds." ";
    $adi .= "<qso_date_off:".strlen( $da ).">".$da." ";
    $adi .= "<time_off:".strlen( $ds ).">".$ds." ";
    $adi .= "<band:".strlen( $data6 ).">".$data6." ";
    $adi .= "<freq:".strlen( $data7 ).">".$data7." ";
    $adi .= "<station_callsign:".strlen( $milicencia ).">".$milicencia." ";
    $adi .= "<my_gridsquare:".strlen( $migrid ).">".$migrid." ";
    $adi .= "<comment:".strlen( $data8 ).">".$data8."  <eor>\r\n";
    $file = fopen( $adiwsjt, "a" );
    fwrite( $file, $adi );
    fclose( $file );
}
?>