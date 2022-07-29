<?php
echo '<head><link rel="stylesheet" href="theme/styles.css"></head>';
$dirt = "C:\\phpdce\\";
date_default_timezone_set( 'UTC' );
include $dirt.'usr\\variables.php';
$adiwsjt = str_replace( "wsjtx_log.adi", "", $adiwsjt );
if ( file_exists( $adiwsjt."ALL.TXT" ) ) {
} else {
    header( "Location: errorall.php" );
}
$file = file( $adiwsjt."ALL.TXT" );
for ( $i = max( 0, count( $file )-22 );
$i < count( $file );
$i += 2 ) {
    $a = explode ( " ", $file[$i] );
    $a = substr( $file[$i], 7, 8 );
    $a .= substr( $file[$i], 23, 80 );
    $a = substr_replace( $a, ":", 2, 0 );
    $a = substr_replace( $a, ":", 5, 0 );
    $b = substr( $file[$i], 7, 8 );
    $b .= substr( $file[$i+1], 23, 80 );
    $b = substr_replace( $b, ":", 2, 0 );
    $b = substr_replace( $b, ":", 5, 0 );
    $as = "#000066";
    $bs = "#000055";
    if ( str_contains( $a, ' CQ ' ) ) {
        $as = "#024a02";
    }
    if ( str_contains( $b, ' CQ ' ) ) {
        $bs = "#024a02";
    }
    if ( str_contains( $a, '73' ) ) {
        $as = "#6c4f00";
    }
    if ( str_contains( $b, '73' ) ) {
        $bs = "#6c4f00";
    }
    if ( str_contains( $a, 'Tx' ) ) {
        $as = "#800000";
    }
    if ( str_contains( $b, 'Tx' ) ) {
        $bs = "#800000";
    }
    echo '<div id="contmega" style="background-color: '.$as.';"><span style="color: #eeffff;">&nbsp;'.$a.'</span></div>';
    echo '<div id="contmega" style="background-color: '.$bs.';"><span style="color: #eeffff;">&nbsp;'.$b.'</span></div>';
}
echo "<script>document.write('');</script>";
header( "refresh: 15" );
?>