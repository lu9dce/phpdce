<?php
/***********************************
* CREADO POR LU9DCE
* Copyright 2022 Eduardo Castillo
* castilloeduardo@outlook.com
* GNU AFFERO GENERAL PUBLIC LICENSE
* Version 3, 19 November 2007
***********************************/

// .-.. ..- ----. -.. -.-. . 

// zona horaria
date_default_timezone_set( 'UTC' );

// directorio de trabajo
$dirt = "C:\\phpdce\\";

// phpdce activo?
include $dirt.'usr\\variables.php';
if ( $phpdce == false ) {
    goto fin;
}

// existe el adi?
if ( file_exists( $adiwsjt ) ) {
    echo '<span title="ROBOT (VERDE OK / ROJO ERROR)" class="dot1"></span>';
} else {
    echo '<span title="ROBOT (VERDE OK / ROJO ERROR)" class="dot0"></span>';
       goto fin;
}

// existe el adicontrol?
if ( is_readable( $dirt.'tmp\\adicontrol' ) ) {
} else {
    file_put_contents( $dirt.'tmp\\adicontrol', '1' );
}

// chequea el md5 del adi
$x = md5_file( $adiwsjt );
$xz = file( $dirt.'tmp\\adicontrol' );
$z = $xz[0];

// chequea si hay nuevo qso
if ( $x == $z ) {
        goto fin;
}

// contador de tiempo a 0
$start_time = microtime( true );

// procesa el ultimo contacto
file_put_contents( $dirt.'tmp\\adicontrol', $x );
$lines = file( $adiwsjt );
$last_dx = $lines[count( $lines )-1];
file_put_contents( $dirt.'tmp\\1.adi', $last_dx );
$xw = str_replace( ' <', ',', $last_dx );
$xw = str_replace( ':', ',', $xw );
$xw = str_replace( '>', ',', $xw );
$xw = str_replace( ', ', ' ', $xw );
$xw = str_replace( '<', '', $xw );
$xxx = explode ( ',', $xw );

// guarda el contacto en formato variable php
$myfile = fopen( $dirt.'tmp\\vardx.php', "a" );
$txt = "<?php\r\n";
fwrite( $myfile, $txt );
for ( $x = 0; $x <= 40; $x += 3 ) {
    $z = $x + 2;
    $txt = "$$xxx[$x] = \"$xxx[$z]\";\r\n";
    fwrite( $myfile, $txt );
}
$txt = "?>\r\n";
fwrite( $myfile, $txt );
fclose( $myfile );
include $dirt.'tmp\\vardx.php';

// genera archivo dx.txt con los datos $att
$att = "$call $mode Send $rst_sent Rcvd $rst_rcvd";
$mya = fopen( $dirt.'tmp\\dx.txt', "w" );
fwrite( $mya, $att );
fclose( $mya );

// calcula la señal rx y tx

function led ( $fgh ) {
    $a = $fgh;
    if ( $a < -20 ) {
        $a = -20;
    }
    if ( $a > 0 ) {
        $a = 0;
    }
    $a = ( $a + 20 ) / 2;
    if ( $a >= 9 ) {
        $a = 9;
    }
    $a = round( $a );
    $b = '..\\www\\img\\'.$a.'.png';
    return $b;
}

// selecciona que imagen led usa en rx y tx
$ledrx = led ( $xxx[11] );
$rx = "..\\www\\rx.png";
copy( $ledrx, $rx );
$ledtx = led ( $xxx[14] );
$tx = "..\\www\\tx.png";
copy( $ledtx, $tx );

// funcion para calcular distancia

function distance( $lat1, $lon1, $lat2, $lon2, $unit ) {
    if ( ( $lat1 == $lat2 ) && ( $lon1 == $lon2 ) ) {
        return 0;
    } else {
        $theta = $lon1 - $lon2;
        $dist = sin( deg2rad( $lat1 ) ) * sin( deg2rad( $lat2 ) ) +  cos( deg2rad( $lat1 ) ) * cos( deg2rad( $lat2 ) ) * cos( deg2rad( $theta ) );
        $dist = acos( $dist );
        $dist = rad2deg( $dist );
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper( $unit );
        if ( $unit == "K" ) {
            return ( $miles * 1.609344 );
        } else if ( $unit == "N" ) {
            return ( $miles * 0.8684 );
        } else {
            return $miles;
        }
    }
}

// crea el archivo freq.txt con la frecuencia usada
$mya = fopen( $dirt.'tmp\\freq.txt', "w" );
fwrite( $mya, $freq );
fclose( $mya );

// comprueba si existe datos del qth si no lo crea
// pone coordenadas locales a variables
if ( file_exists( $dirt.'tmp\\miqth.xml' ) ) {
    $xcml = simplexml_load_file( $dirt.'tmp\\miqth.xml' );
    $milat = number_format( intval( $xcml->dxcc->lat ), 2 );
    $milng = number_format( intval( $xcml->dxcc->lng ), 2 );
} else {
    $tcall = $call;
    $call = $milicencia;
    include $dirt.'modulos\\dxcc.php';
    rename( $dirt.'tmp\\xdxcc.xml', $dirt.'tmp\\miqth.xml' );
    $call = $tcall;
    $xcml = simplexml_load_file( $dirt.'tmp\\miqth.xml' );
    $milat = number_format( intval( $xcml->dxcc->lat ), 2 );
    $milng = number_format( intval( $xcml->dxcc->lng ), 2 );
}

// busca las coordenadas del contacto
include $dirt.'modulos\\dxcc.php';
rename( $dirt.'tmp\\xdxcc.xml', $dirt.'tmp\\busq.xml' );

// coordenadas del contacto a variables
$xml = simplexml_load_file( $dirt.'tmp\\busq.xml' );
$qsolat = number_format( intval( $xml->dxcc->lat ), 2 );
$qsolng = number_format( intval( $xml->dxcc->lng ), 2 );

// crea archivo datos qsoqth.txt
$infqth = $xml->dxcc->name." (".$xml->dxcc->continent.") - Waz : ".$xml->dxcc->waz." - Itu : ".$xml->dxcc->itu." - Lat (".$qsolat.") Lng (".$qsolng.")";
$myw = fopen( $dirt.'tmp\\qsoqth.txt', "w" );
fwrite( $myw, $infqth );
fclose( $myw );

// crea archivo datos dista.txt
$dista = distance( $milat, $milng, $qsolat, $qsolng, "K" );
$dista = "Distancia : ".( int )$dista." Km";
$mya = fopen( $dirt.'tmp\\dista.txt', "w" );
fwrite( $mya, $dista );
fclose( $mya );

// crea archivo datos banda.txt
$myb = fopen( $dirt.'tmp\\band.txt', "w" );
fwrite( $myb, $band );
fclose( $myb );

// crea archivo datos dxdia.txt
$myx = fopen( $dirt.'tmp\\dxdia.txt', "w" );
$eex = file_get_contents( $adiwsjt );
$cxc = "<qso_date:8>".date( "Ymd" );
$contdx = substr_count( $eex, $cxc );
fwrite( $myx, $contdx );
fclose( $myx );

// comprueba si cluster esta activo y lo ejecuta
if ( $activacluster == "si" ) {
    include $dirt.'modulos\\cluster.php';
}

// comprueba si aprs esta activo y lo ejecuta
if ( $activaaprs == "si" ) {
    include $dirt.'modulos\\aprs.php';
}

// comprueba si eqsl esta activo y lo ejecuta
if ( $activaeqsl == "si" ) {
    include $dirt.'modulos\\eqsl.php';
}

// comprueba si clublog esta activo y lo ejecuta
if ( $activaclub == "si" ) {
    include $dirt.'modulos\\clublog.php';
}

// comprueba si hdrlog esta activo y lo ejecuta
if ( $activahdr == "si" ) {
    include $dirt.'modulos\\hdrlog.php';
}

// comprueba si log de argentina esta activo y lo ejecuta
if ( $activaarg == "si" ) {
    include $dirt.'modulos\\argentina.php';
}

// comprueba si qrz esta activo y lo ejecuta
if ( $activaqrz == "si" ) {
    include $dirt.'modulos\\qrz.php';
}

// comprueba si hamqth de argentina esta activo y lo ejecuta
if ( $activaqth == "si" ) {
    include $dirt.'modulos\\hamqth.php';
}

// comprueba si lotw de argentina esta activo y lo ejecuta
if ( $activalotw == "si" ) {
    include $dirt.'modulos\\lotw.php';
}

// comprueba si mail de argentina esta activo y lo ejecuta
if ( $sendmail == "si" ) {
    include $dirt.'modulos\\mail.php';
}

// hace backup del adi
$backup = $dirt.'adibackup\\backup.adi';
copy ( $adiwsjt, $backup );

// limpia de archivos no requeridos
unlink( $dirt.'tmp\\1.adi' );
unlink( $dirt.'tmp\\vardx.php' );

// termina el contador de tiempo
$end_time = microtime( true );

// calcula cuanto tardo
$execution_time = ( $end_time - $start_time );

// guarda el tiempo en time.txt
$fin = number_format( $execution_time, 2 );
$mya = fopen( $dirt.'tmp\\time.txt', "w" );
fwrite( $mya, $fin );
fclose( $mya );

fin:

?>
