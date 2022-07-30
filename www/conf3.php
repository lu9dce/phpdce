<?php
/***********************************
* CREADO POR LU9DCE
* Copyright 2022 Eduardo Castillo
* castilloeduardo@outlook.com
* GNU AFFERO GENERAL PUBLIC LICENSE
* Version 3, 19 November 2007
***********************************/
// .-.. ..- ----. -.. -.-. .
include 'C:\\phpdce\\usr\\variables.php';
include 'C:\\phpdce\\www\\confx.php';
echo '<form method="post">';
echo '<h2>CLUSTER DATA</h2>';
echo 'ACTIVE <input title="ENTER yes OR no IN lowercase" type="text" name="activacluster" size="50" value="'.htmlspecialchars( $activacluster ).'" /><br>';
echo 'IP <input title="ADDRESS OR IP OF THE CLUSTER USED (TELNET)" type="text" name="clustertelnet" size="50" value="'.htmlspecialchars( $clustertelnet ).'" /><br>';
echo 'PORT <input title="PORT TELNET" type="text" name="clusterport" size="50" value="'.htmlspecialchars( $clusterport ).'" /><br>';
echo '<br><input type="submit" name="submit"></form>';
if ( isset( $_POST['activacluster'] ) ) {
    $data1 = $_POST['activacluster'];
    $data2 = $_POST['clustertelnet'];
    $data3 = $_POST['clusterport'];
    $str = file_get_contents( 'C:\\phpdce\\usr\\variables.php' );
    $oldContent = '$activacluster = "'.$activacluster.'";';
    $newContent = '$activacluster = "'.$data1.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$clustertelnet = "'.$clustertelnet.'";';
    $newContent = '$clustertelnet = "'.$data2.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    $oldContent = '$clusterport = "'.$clusterport.'";';
    $newContent = '$clusterport = "'.$data3.'";';
    $str = str_replace( $oldContent, $newContent, $str );
    if ( ( $activacluster != $data1 ) || ( $clustertelnet != $data2 ) || ( $clusterport != $data3 ) ) {
        echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESSING PLEASE WAIT</h2>';
        file_put_contents( 'C:\\phpdce\\usr\\variables.php', $str );
    } else {
        echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NOTHING IS MODIFIED</h2>';
    }
    header( "Refresh:5" );
}
?>