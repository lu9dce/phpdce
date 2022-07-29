<?php
/*
* CREADO POR LU9DCE
* Copyright 2022 eduardo <eduardo@ELEMENTAL>
*
*/

// prepara curl con los datos para llenar formulario
$cf = new CURLFile( $dirt.'tmp\\1.adi' );
$post = [
    "file" => $cf,
    "callsign" => $clubuser,
    "password" => $clubpass,
    "api" => "21507885dece41ca049fec7fe02a813f2105aff2",
    "email" => $clubmail
];

// inicia curl con la direccion de subida
$ch = curl_init( 'https://secure.clublog.org/putlogs.php' );

// parametros de curl
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

// hace el post estilo formulario
curl_setopt( $ch, CURLOPT_POSTFIELDS, $post );

// chequea el resultado
$result = curl_exec( $ch );

// cierra curl
curl_close( $ch );

// guarda un log
file_put_contents( $dirt.'log\\clublog.txt', $result );

?>
