<?php
/*
* CREADO POR LU9DCE
* Copyright 2022 eduardo <eduardo@ELEMENTAL>
*
*/

// selecciona hora a utc
date_default_timezone_set( 'UTC' );

// datos para la qsl
$at = "DX $call $freq $mode Send $rst_sent Rcvd $rst_rcvd $dxcomen";

// formato del dia y hora
$hora = date( DATE_RFC850 );

// tipo de letra
$fontFile = realpath( 'C:\\Windows\\Fonts\\Arial.ttf' );

// crea un fondo al azar ( 800x600 )
if ( $fondo == "azar" ) {
    file_put_contents( $dirt.'tmp\\random.jpg', file_get_contents( 'https://unsplash.it/800/600' ) );
    $fondo = $dirt.'tmp\\random.jpg';
}

// crea la qsl con el texto a 800x600
$im = imagecreatetruecolor( 800, 600 );
$aa = imagecreatefromjpeg( $fondo );
list( $w, $h ) = getimagesize( $fondo );
imagecopyresized( $im, $aa, 0, 0, 0, 0, 800, 600, $w, $h );
$color = imagecolorallocate( $im, 0, 0, 110 );
$color = imagecolorallocatealpha( $im, 0, 0, 0, 30 );
imagefilledrectangle( $im, 0, 400, 800, 550, $color );

// genera texto negro y arriba blanco ( simula sombra )
$cc = 0;
for ( $a = 0; $a <= 2; $a += 2 ) {
    $color = imagecolorallocatealpha( $im, $cc, $cc, $cc, 0 );
    imagettftext( $im, 60, 0, 30, 80+$a, $color, $fontFile, $milicencia );
    imagettftext( $im, 40, 0, 32, 150+$a, $color, $fontFile, $minombre );
    imagettftext( $im, 25, 0, 32, 200+$a, $color, $fontFile, "$miqth - ($migrid)" );
    imagettftext( $im, 20, 0, 30, 450+$a, $color, $fontFile, "$at" );
    imagettftext( $im, 20, 0, 30, 510+$a, $color, $fontFile, "$hora" );
    imagettftext( $im, 8, 0, 700, 590+$a, $color, $fontFile, "Design by LU9DCE" );
    imagettftext( $im, 30, 0, 30, 350+$a, $color, $fontFile, $malname );
    $cc = 255;
}

// guarda la imagen generada
imagejpeg( $im, $dirt.'tmp\\qsl.jpg' );

// limpia ram
imagedestroy( $im );
unlink ( $dirt.'tmp\\random.jpg' );

?>
