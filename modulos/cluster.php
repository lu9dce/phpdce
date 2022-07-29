<?php
/***********************************
* CREADO POR LU9DCE
* Copyright 2022 Eduardo Castillo
* castilloeduardo@outlook.com
* GNU AFFERO GENERAL PUBLIC LICENSE
* Version 3, 19 November 2007
***********************************/

// .-.. ..- ----. -.. -.-. . 

$apap = NULL;

// genera el texto que se enviara al cluster
$at = "DX $call $freq $mode Send $rst_sent Rcvd $rst_rcvd $dxcomen";

// entra al cluster estilo telnet
$da = fsockopen( $clustertelnet, $clusterport, $errno, $errstr, 50 );

// envia usuario y el password
fwrite( $da, "$station_callsign\r\n" );
sleep( 1 );

// envia el comando
fwrite( $da, "$at\r\n" );
sleep( 1 );

// almacena datos para el log
for ( $a = 0; $a < 10; $a++ ) {
    $apap .= fgets( $da );
}

// cierra la coneccion
fclose( $da );

// guarda un log
file_put_contents( $dirt.'log\\cluster.txt', $apap );

?>
