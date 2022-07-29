<!DOCTYPE html>
<html>

<head>
    <title>main</title>
    <meta http-equiv="refresh" content="60">
    <link rel="stylesheet" href="theme/styles.css">
</head>

<body>
    <?php
    $dirt = "C:\\phpdce\\";
    include $dirt.'usr\\variables.php';
    ?>
        <div id="tableta" class="main">
            <div id="contenido">
                <div id="colum">
                    <div id="columi" class="barra">
                        <img src="img/cpu.png" width="14" height="14" />
                        <?php echo @file_get_contents($dirt."tmp\\time.txt"); ?>s
                    </div>
                    <div id="colum" class="barra">
                        BAND
                        <?php echo @file_get_contents($dirt."tmp\\band.txt"); ?>
                            QSO
                            <?php echo @file_get_contents($dirt."tmp\\dxdia.txt"); ?>
                    </div>
                    <div id="columd" class="barra">
                        <?php
                        if ( @fopen("https://www.google.com", "r") ) 
                        {
                        echo '<img src="img/wifi.png" width="14" height="14" />';
                        } else {
                        echo '<img src="img/wifi.png" width="14" height="14" />';
                        }
                        ?>
                            <img src="img/bat.png" width="14" height="14">
                            <?php
					    date_default_timezone_set( 'UTC' );
                        echo date("H:i");
				        ?>
                    </div>
                </div>
            </div>
            <div id="contenido">
                <div id="tabletab">
                    <div id="colum" class="rimg">
                        <img src="rx.png" width="15" height="110" />
                        <p class="rtxt">RX</p>
                    </div>
                    <div id="colum">
                        <pre title="FRECUENCIA ACTIVA" class="freq"><?php echo @file_get_contents($dirt."tmp\\freq.txt"); ?></pre>
                    </div>
                    <div id="colum" class="rimg">
                        <img src="tx.png" width="15" height="110" />
                        <p class="rtxt">TX</p>
                    </div>
                </div>
            </div>
            <div id="contenido">
                <div id="colum">
                    <h3><strong><?php echo @file_get_contents($dirt."tmp\\dista.txt"); ?><br><?php echo @file_get_contents($dirt."tmp\\qsoqth.txt"); ?></strong></h3>
                </div>
            </div>
            <div id="contenido">
                <div id="colum">
                    <br>
                </div>
            </div>
            <div id="contenido">
                <div id="colum" class="dx">
                    <?php echo @file_get_contents($dirt."tmp\\dx.txt"); echo "<br>"; ?>
                </div>
            </div>
            <div id="contenido">
                <div id="colum">
                    <br>
                </div>
            </div>
            <div id="contenido">
                <div id="colum">
                </div>
            </div>
            <div id="contenido" class="base">
                <div id="colum">
                    <div id="tableta" class="base">
                        <div id="contenido">
                            <div id="colum">
                            </div>
                            <div id="colum">
                                SPOT
                            </div>
                            <div id="colum">
                                APRS
                            </div>
                            <div id="colum">
                                ALOG
                            </div>
                            <div id="colum">
                                CLOG
                            </div>
                            <div id="colum">
                                EQSL
                            </div>
                            <div id="colum">
                                HAMQ
                            </div>
                            <div id="colum">
                                HDRL
                            </div>
                            <div id="colum">
                                LOTW
                            </div>
                            <div id="colum">
                                QRZL
                            </div>
                            <div id="colum">
                                MAIL
                            </div>
                        </div>
                        <div id="contenido">
                            <div id="colum">
                                ACTIVO
                            </div>
                            <div id="colum">
                                <?php
                             if ($activacluster == "si") {
                             echo '<span title="ACTIVO" class="dot1"></span>';
                             } else {
                             echo '<span title="DESACTIVADO" class="dot2"></span>'; }
                             ?>
                            </div>
                            <div id="colum">
                                <?php
                            if ($activaaprs == "si") {
                                echo '<span title="ACTIVO" class="dot1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dot2"></span>'; }
                            ?>
                            </div>
                            <div id="colum">
                                <?php
                            if ($activaarg == "si") {
                                echo '<span title="ACTIVO" class="dot1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dot2"></span>'; }
                            ?>
                            </div>
                            <div id="colum">
                                <?php
                            if ($activaclub == "si") {
                                echo '<span title="ACTIVO" class="dot1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dot2"></span>'; }
                            ?>
                            </div>
                            <div id="colum">
                                <?php
                            if ($activaeqsl == "si") {
                                echo '<span title="ACTIVO" class="dot1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dot2"></span>'; }
                            ?>
                            </div>
                            <div id="colum">
                                <?php
                            if ($activaqth == "si") {
                                echo '<span title="ACTIVO" class="dot1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dot2"></span>'; }
                            ?>
                            </div>
                            <div id="colum">
                                <?php
                            if ($activahdr == "si") {
                                echo '<span title="ACTIVO" class="dot1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dot2"></span>'; }
                            ?>
                            </div>
                            <div id="colum">
                                <?php
                            if ($activalotw == "si") {
                                echo '<span title="ACTIVO" class="dot1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dot2"></span>'; }
                            ?>
                            </div>
                            <div id="colum">
                                <?php 
                            if ($activaqrz == "si") {
                                echo '<span title="ACTIVO" class="dot1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dot2"></span>'; }
                            ?>
                            </div>
                            <div id="colum">
                                <?php 
                            if ($sendmail == "si") {
                                echo '<span title="ACTIVO" class="dot1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dot2"></span>'; }
                            ?>
                            </div>
                        </div>
                        <div id="contenido">
                            <div id="colum">
                                ENVIO
                            </div>
                            <div id="colum">
                                <?php
                            if (str_contains(@file_get_contents($dirt.'log\\cluster.txt'), '>')) {
                                echo '<span title="ACTIVO" class="dol1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dol2"></span>'; }
                            ?>
                            </div>
                            <div id="colum">
                                <?php 
                            if (str_contains(@file_get_contents($dirt.'log\\aprs.txt'), 'verified')) {
                                echo '<span title="ACTIVO" class="dol1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dol2"></span>'; }
                            ?>
                            </div>
                            <div id="colum">
                                <?php
                            if (str_contains(@file_get_contents($dirt.'log\\argenlog.txt'), 'Guardado OK')) {
                                echo '<span title="ACTIVO" class="dol1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dol2"></span>'; }
                            ?>
                            </div>
                            <div id="colum">
                                <?php 
                            if (str_contains(@file_get_contents($dirt.'log\\clublog.txt'), 'Upload accepted and queued')) {
                                echo '<span title="ACTIVO" class="dol1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dol2"></span>'; }
                            ?>
                            </div>
                            <div id="colum">
                                <?php 
                            if (str_contains(@file_get_contents($dirt.'log\\eqsl.txt'), '1 out of 1 records added')) {
                                echo '<span title="ACTIVO" class="dol1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dol2"></span>'; }
                            ?>
                            </div>
                            <div id="colum">
                                <?php 
                            if (str_contains(@file_get_contents($dirt.'log\\hamqth.txt'), 'QSO inserted')) {
                                echo '<span title="ACTIVO" class="dol1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dol2"></span>'; }
                            ?>
                            </div>
                            <div id="colum">
                                <?php 
                            if (str_contains(@file_get_contents($dirt.'log\\hdrlog.txt'), '<insert>1')) {
                                echo '<span title="ACTIVO" class="dol1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dol2"></span>'; }
                            ?>
                            </div>
                            <div id="colum">
                                <?php 
                            if (str_contains(@file_get_contents($dirt.'log\\lotw.txt'), '1')) {
                                echo '<span title="ACTIVO" class="dol1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dol2"></span>'; }
                            ?>
                            </div>
                            <div id="colum">
                                <?php
                            if (str_contains(@file_get_contents($dirt.'log\\qrz.txt'), 'OK')) {
                                echo '<span title="ACTIVO" class="dol1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dol2"></span>'; }
                            ?>
                            </div>
                            <div id="colum">
                                <?php 
                            if (str_contains(@file_get_contents($dirt.'log\\mail.txt'), '1')) {
                                echo '<span title="ACTIVO" class="dol1"></span>';
                            } else { echo '<span title="DESACTIVADO" class="dol2"></span>'; }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="contenido">
                <div id="colum">
                    <br>
                </div>
            </div>
        </div>
</body>

</html>
