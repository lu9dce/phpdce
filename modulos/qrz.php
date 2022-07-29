<?php
/*
* CREADO POR LU9DCE
* Copyright 2022 eduardo <eduardo@ELEMENTAL>
*
*/

// convierte el adi a formato url
$qa = str_replace( ' <', '<', $last_dx );
$qa = str_replace( ' ', '%20', $qa );
$qa = preg_replace( "/\r|\n/", "", $qa );

// url de subida incluyendo el adi
$qrr = "https://logbook.qrz.com/api?$qrzkey&ACTION=INSERT&ADIF=$qa";

// inicializa curl con la url
$ch = curl_init( "$qrr" );

// parametros de curl
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

// chequea el resultado
$result = curl_exec( $ch );

// cierra curl
curl_close( $ch );

// guarda un log
file_put_contents( $dirt.'log\\qrz.txt', $result );

?>
