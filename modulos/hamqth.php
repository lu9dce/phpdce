<?php
/***********************************
* CREADO POR LU9DCE
* Copyright 2022 Eduardo Castillo
* castilloeduardo@outlook.com
* GNU AFFERO GENERAL PUBLIC LICENSE
* Version 3, 19 November 2007
***********************************/

// .-.. ..- ----. -.. -.-. . 

// prepara adi para subir
$qa = preg_replace( "/\r|\n/", "", $last_dx );

// prepara curl con los datos para llenar formulario
$post = [
    "u" => $hamuser,
    "p" => $hampass,
    "prg" => "logger32",
    "cmd" => "insert",
    "adif" => $qa
];

// inicia curl con la direccion de subida
$ch = curl_init( 'https://www.hamqth.com/qso_realtime.php' );

// parametros de curl
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

// hace el post estilo formulario
curl_setopt( $ch, CURLOPT_POSTFIELDS, $post );

// chequea el resultado
$result = curl_exec( $ch );

// cierra curl
curl_close( $ch );

// guarda un log
file_put_contents( $dirt.'log\\hamqth.txt', $result );

?>
