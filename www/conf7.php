<!DOCTYPE html>
<?php include 'C:\\phpdce\\usr\\variables.php'; ?>
    <html>

    <head>
        <title>conf7</title>
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
            <h2>HDRLOG</h2> ACTIVO
            <input title="ENTRE si O no EN minuscula" type="text" name="activahdr" size="50" value="<?php echo htmlspecialchars($activahdr); ?>" />
            <br> USUARIO
            <input title="USUARIO DE HDRLOG" type="text" name="hdruser" size="50" value="<?php echo htmlspecialchars($hdruser); ?>" />
            <br> CODIGO
            <input title="SU CODIGO (NO PASSWORD)" type="password" name="hdrcode" size="50" value="<?php echo htmlspecialchars($hdrcode); ?>" />
            <br>
            <br>
            <input type="submit" name="submit">
        </form>
    </body>

    </html>
    <?php
if(isset($_POST['activahdr']))
{
$data1=$_POST['activahdr'];
$data2=$_POST['hdruser'];
$data3=$_POST['hdrcode'];
$str = file_get_contents('C:\\phpdce\\usr\\variables.php');
$oldContent='$activahdr = "'.$activahdr.'";';
$newContent='$activahdr = "'.$data1.'";';
$str = str_replace($oldContent, $newContent, $str);
$oldContent='$hdruser = "'.$hdruser.'";';
$newContent='$hdruser = "'.$data2.'";';
$str = str_replace($oldContent, $newContent, $str);
$oldContent='$hdrcode = "'.$hdrcode.'";';
$newContent='$hdrcode = "'.$data3.'";';
$str = str_replace($oldContent, $newContent, $str);
if (($activahdr != $data1)||($hdruser != $data2)||($hdrcode != $data3)) {
    echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESANDO ESPERE</h2>';
    file_put_contents('C:\\phpdce\\usr\\variables.php', $str);
} else {
    echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NO SE MODIFICO NADA</h2>';
}
header("Refresh:5");
}
?>
