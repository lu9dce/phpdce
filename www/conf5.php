<!DOCTYPE html>
<?php include 'C:\\phpdce\\usr\\variables.php'; ?>
    <html>

    <head>
        <title>conf5</title>
        <link rel="stylesheet" href="theme/form.css">
    </head>

    <body>
        <a href="conf1.php" target="_self">datos</a>
        <a href="conf2.php" target="_self">adi</a>
        <a href="conf3.php" target="_self">cluster</a>
        <a href="conf4.php" target="_self">eqsl</a>
        <a href="conf5.php" target="_self">aprs</a>
        <a href="conf6.php" target="_self">clublog</a>
        <a href="conf7.php" target="_self">hdrlog</a>
        <a href="conf8.php" target="_self">arglog</a>
        <a href="conf9.php" target="_self">qrz</a>
        <a href="conf10.php" target="_self">hamqth</a>
        <a href="conf11.php" target="_self">lotw</a>
        <a href="conf12.php" target="_self">mail</a>
        <a href="conf13.php" target="_self">motor</a>
        <br>
        <form method="post">
            <h2>APRS</h2> ACTIVO
            <input title="ENTRE si O no EN minuscula" type="text" name="activaaprs" size="50" value="<?php echo htmlspecialchars($activaaprs); ?>" />
            <br> CORDENADAS
            <input title="EJ 3428.20S/05845.35W" type="text" name="aprsqth" size="50" value="<?php echo htmlspecialchars($aprsqth); ?>" />
            <br> PASSCODE
            <input title="EL PASSCODE DE APRS" type="password" name="aprscode" size="50" value="<?php echo htmlspecialchars($aprscode); ?>" />
            <br>
            <br>
            <input type="submit" name="submit">
        </form>
    </body>

    </html>
    <?php
if(isset($_POST['activaaprs']))
{
$data1=$_POST['activaaprs'];
$data2=$_POST['aprsqth'];
$data3=$_POST['aprscode'];
$str = file_get_contents('C:\\phpdce\\usr\\variables.php');
$oldContent='$activaaprs = "'.$activaaprs.'";';
$newContent='$activaaprs = "'.$data1.'";';
$str = str_replace($oldContent, $newContent, $str);
$oldContent='$aprsqth = "'.$aprsqth.'";';
$newContent='$aprsqth = "'.$data2.'";';
$str = str_replace($oldContent, $newContent, $str);
$oldContent='$aprscode = "'.$aprscode.'";';
$newContent='$aprscode = "'.$data3.'";';
$str = str_replace($oldContent, $newContent, $str);
if (($activaaprs != $data1)||($aprsqth != $data2)||($aprscode != $data3)) {
    echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESANDO ESPERE</h2>';
    file_put_contents('C:\\phpdce\\usr\\variables.php', $str);
} else {
    echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NO SE MODIFICO NADA</h2>';
}
header("Refresh:5");
}
?>
