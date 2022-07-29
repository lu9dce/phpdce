<?php
/*
* CREADO POR LU9DCE
* Copyright 2022 eduardo <eduardo@ELEMENTAL>
*
*/

// url de envio hacia log de argentina
$arg = "https://www.logdeargentina.com.ar/php/subeqso2.php?user=$argenuser&pass=$argenpass&micall=$station_callsign&sucall=$call&banda=$band&modo=$mode&fecha=$qso_date&hora=$time_on&rst=$rst_sent";

// inicializa curl con la url
$ch = curl_init( "$arg" );

// parametros de curl
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

// chequea el resultado
$result = curl_exec( $ch );

// guarda un log
file_put_contents( $dirt.'log\\argenlog.txt', $result );

// cierra curl
curl_close( $ch );

?>
