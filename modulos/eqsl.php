<?php
/*
* CREADO POR LU9DCE
* Copyright 2022 eduardo <eduardo@ELEMENTAL>
*
*/

// prepara curl con los datos para llenar formulario
$cf = new CURLFile( $dirt.'tmp\\1.adi' );
$post = [
    "EQSL_USER" => $eqsluser,
    "EQSL_PSWD" => $eqslpass,
    "Filename" => $cf
];

// inicia curl con la direccion de subida
$ch = curl_init( 'http://www.eqsl.cc/qslcard/ImportADIF.cfm' );

// parametros de curl
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

// hace el post estilo formulario
curl_setopt( $ch, CURLOPT_POSTFIELDS, $post );

// chequea el resultado
$result = curl_exec( $ch );

// cierra curl
curl_close( $ch );

// guarda un log
file_put_contents( $dirt.'log\\eqsl.txt', $result );

?>
