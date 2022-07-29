<!DOCTYPE html>
<html>

<head>
    <title>notas</title>
</head>

<body>
    <h2 style="color: #55ffff;">Notas rapidas</h2>
    <?php $no=file_get_contents("nota.txt"); ?>
        <form method="post">
            <textarea name="nota" style=" font-size:24px;" rows="13" cols="40">
                <?php echo $no; ?>
            </textarea>
            <br>
            <input type="submit" name="submit">
        </form>
</body>

</html>
<?php
if(isset($_POST['nota']))
{
$data1=$_POST['nota'];
$file = fopen('nota.txt', "w");
fwrite($file, $data1);
fclose($file);
header("Refresh:0");
}
?>
