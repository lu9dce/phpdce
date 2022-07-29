<?php
/***********************************
* CREADO POR LU9DCE
* Copyright 2022 Eduardo Castillo
* castilloeduardo@outlook.com
* GNU AFFERO GENERAL PUBLIC LICENSE
* Version 3, 19 November 2007
***********************************/
// .-.. ..- ----. -.. -.-. . 
// url con usuario y password de phpdce ( free ) consulta id
$qrx = "https://www.hamqth.com/xml.php?u=xx0php&p=phpdce";
// inicializa curl
$ch = curl_init();
// abre curl con la url
curl_setopt( $ch, CURLOPT_URL, $qrx );
// parametros de curl
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
// el resultado lo guarda en una variable xml
$qxml = curl_exec( $ch );
// cierra curl
curl_close( $ch );
// carga de la variable a xml
$qxml = simplexml_load_string( $qxml );
// toma el id de la session
$id = $qxml->session->session_id;
// url de busqueda xml via id
$qrx = "https://www.hamqth.com/xml.php?id=$id&callsign=$call&prg=logger32";
// inicializa curl
$ch = curl_init();
// abre curl con la url
curl_setopt( $ch, CURLOPT_URL, $qrx );
// parametros de curl
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
// el resultado lo guarda en una variable xml
$zxml = curl_exec( $ch );
// cierra curl
curl_close( $ch );
// crea un archivo y guarda los datos
$myya = fopen( $dirt.'tmp\\xusq.xml', "w" );
fwrite( $myya, $zxml );
fclose( $myya );
?>