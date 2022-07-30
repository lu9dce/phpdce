<?php
/***********************************
* CREADO POR LU9DCE
* Copyright 2022 Eduardo Castillo
* castilloeduardo@outlook.com
* GNU AFFERO GENERAL PUBLIC LICENSE
* Version 3, 19 November 2007
***********************************/
// .-.. ..- ----. -.. -.-. .

$sepa = '<div id="contenido"><div id="colum"><div id="sepa"></div></div></div>';
$cont = '<div id="contenido"><div id="colum">';
$seco = '</a></div></div>'.$sepa.$cont;

echo '
<head><link rel="stylesheet" href="theme/styles.css"></head>
<body class="bod">
    <div id="tableta">
    <div id="contenido">
    <div id="columb">
'.$cont.'
    <a href="main.php" target="demo">
    <button class="but" title="PANTALLA PRINCIPAL">A</button
'.$seco.'
    <a href="mega.php" target="demo">
    <button class="but" title="QSO EN TIEMPO REAL">B</button>
'.$seco.'
    <a href="conf1.php" target="demo">
    <button class="but" title="CONFIGURACION">C</button>
'.$seco.'
    <a href="mqso.php" target="demo">
    <button class="but" title="AGREGA UN QSO">D</button>
'.$seco.'
    <a href="ayuda.php" target="demo">
    <button class="but" title="AYUDA">E</button>
'.$seco.'
    <a href="https://services.swpc.noaa.gov/images/ace-mag-swepam-6-hour.gif" target="demo">
    <button class="but" title="PROPAGACION SOLAR">F</button>
'.$seco.'
    <iframe name="efete" src="efete.php" scrolling="no" frameborder="0" height="40" width="40"></iframe>
    </div>
    </div>
    </div>
    <div id="colum">
    <iframe name="demo" src="main.php" scrolling="no" height="500" frameborder="0" width="600"></iframe>
    </div>
    <div id="columb">
'.$cont.'
    <a href="https://dxcluster.ha8tks.hu/V2/map" target="demo">
    <button class="but" title="GRIDTRACKER">H</button>
'.$seco.'
    <a href="http://www.sk6aw.net/cluster/" target="demo">
    <button class="but" title="DX CLUSTER">I</button>
    </a>
'.$seco.'
    <a href="https://clockie.app/?day=full&imageEffect=darken&date=dm&imageDescription=hide&year=full&month=full" target="demo">
    <button class="but" title="RELOJ">J</button>
'.$seco.'
    <a href="https://maps.darksky.net/@temperature,-34,-60" target="demo">
    <button class="but" title="CLIMA">K</button>
'.$seco.'
    <a href="https://openstreetmap.org.ar/#3.1/-34/-60" target="demo">
    <button class="but" title="MAPA">L</button>
'.$seco.'
    <a href="nota.php" target="demo">
    <button class="but" title="ANOTADOR">X</button>
'.$seco.'
    <a href="sunmap.php" target="demo">
    <button class="but" title="SOL Y LUNA">Z</button>
    </a>
    </div>
    </div>
    </div>
    </div>
    </div>
    </body>
';
?>