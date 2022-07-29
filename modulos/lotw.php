<?php
/***********************************
* CREADO POR LU9DCE
* Copyright 2022 Eduardo Castillo
* castilloeduardo@outlook.com
* GNU AFFERO GENERAL PUBLIC LICENSE
* Version 3, 19 November 2007
***********************************/
// .-.. ..- ----. -.. -.-. . 
// ejecuta en segundo plano tqsl
echo exec( '"C:\\Program Files (x86)\\TrustedQSL\\tqsl.exe"'.' -c '.$milicencia.' -q -d -u '.$dirt.'tmp\\1.adi -a all' );
if ( file_exists( 'C:\\Program Files (x86)\\TrustedQSL\\tqsl.exe' ) ) {
    $xx = "1";
} else {
    $xx = "0";
}
file_put_contents( $dirt.'log\\lotw.txt', $xx );
?>