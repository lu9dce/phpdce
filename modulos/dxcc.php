<?php
/***********************************
* CREADO POR LU9DCE
* Copyright 2022 Eduardo Castillo
* castilloeduardo@outlook.com
* GNU AFFERO GENERAL PUBLIC LICENSE
* Version 3, 19 November 2007
***********************************/

// .-.. ..- ----. -.. -.-. . 

// url para consulta de dxcc
$qrx = "https://www.hamqth.com/dxcc.php?callsign=$call";

// inicializa curl con la url
$ch = curl_init();

// parametros de curl
curl_setopt( $ch, CURLOPT_URL, $qrx );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );

// resultado a variable xml
$zxml = curl_exec( $ch );

// cierra curl
curl_close( $ch );

// crea un archivo y guarda los datos
$myya = fopen( $dirt.'tmp\\xdxcc.xml', "w" );
fwrite( $myya, $zxml );
fclose( $myya );

?>
