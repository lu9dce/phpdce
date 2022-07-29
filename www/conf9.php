<!DOCTYPE html>
<?php include 'C:\\phpdce\\usr\\variables.php'; ?>
<html>

<head>
    <title>conf9</title>
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
        <h2>QRZ.COM</h2> ACTIVO
        <input title="ENTRE si O no EN minuscula" type="text" name="activaqrz" size="50" value="<?php echo htmlspecialchars($activaqrz); ?>" />
        <br> USUARIO
        <input title="SUELE SER SU LICENCIA" type="text" name="qrzuser" size="50" value="<?php echo htmlspecialchars($qrzuser); ?>" />
        <br> PASSWORD
        <input title="PASSWORD?" type="password" name="qrzpass" size="50" value="<?php echo htmlspecialchars($qrzpass); ?>" />
        <br> KEY
        <input title="KEY SOLO LO DAN A CUENTAS PAGAS" type="text" name="qrzkey" size="50" value="<?php echo htmlspecialchars($qrzkey); ?>" />
        <br>
        <br>
        <input type="submit" name="submit">
    </form>
</body>

</html>
<?php
if(isset($_POST['activaqrz']))
{
$data1=$_POST['activaqrz'];
$data2=$_POST['qrzuser'];
$data3=$_POST['qrzpass'];
$data4=$_POST['qrzkey'];
$str = file_get_contents('C:\\phpdce\\usr\\variables.php');
$oldContent='$activaqrz = "'.$activaqrz.'";';
$newContent='$activaqrz = "'.$data1.'";';
$str = str_replace($oldContent, $newContent, $str);
$oldContent='$qrzuser = "'.$qrzuser.'";';
$newContent='$qrzuser = "'.$data2.'";';
$str = str_replace($oldContent, $newContent, $str);
$oldContent='$qrzpass = "'.$qrzpass.'";';
$newContent='$qrzpass = "'.$data3.'";';
$str = str_replace($oldContent, $newContent, $str);
$oldContent='$qrzkey = "'.$qrzkey.'";';
$newContent='$qrzkey = "'.$data4.'";';
$str = str_replace($oldContent, $newContent, $str);
if (($activaqrz != $data1)||($qrzuser != $data2)||($qrzpass != $data3)||($qrzkey != $data4)) {
    echo '<h2 style="background-color:#0014ff; color: #ffffff; text-align:center">PROCESANDO ESPERE</h2>';
    file_put_contents('C:\\phpdce\\usr\\variables.php', $str);
} else {
    echo '<h2 style="background-color:#ff0000; color: #ffffff; text-align:center">NO SE MODIFICO NADA</h2>';
}
header("Refresh:5");
}
?>
