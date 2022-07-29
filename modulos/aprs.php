<?php
/***********************************
* CREADO POR LU9DCE
* Copyright 2022 Eduardo Castillo
* castilloeduardo@outlook.com
* GNU AFFERO GENERAL PUBLIC LICENSE
* Version 3, 19 November 2007
***********************************/

// .-.. ..- ----. -.. -.-. . 

// genera el texto que se enviara al aprs
$at = "DX $call $freq $mode Send $rst_sent Rcvd $rst_rcvd $dxcomen";

// genera un comando con posicion local
$comando = "$milicencia-8>APZ100,WIDE1*:=$aprsqth-$at";

// entra al aprs estilo telnet
$da = fsockopen( "soam.aprs2.net", "14580", $errno, $errstr, 50 );

// envia usuario y el passcode
fwrite( $da, "user $milicencia pass $aprscode\r\n" );
sleep( 1 );

// envia el comando
fwrite( $da, "$comando\r\n" );
sleep( 1 );

// almacena datos para el log
$apap = fgets( $da );
$apap .= fgets( $da );

// cierra la coneccion
fclose( $da );

// guarda un log
file_put_contents( $dirt.'log\\aprs.txt', $apap );

?>
