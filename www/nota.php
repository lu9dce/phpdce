<?php
$no = file_get_contents( "nota.txt" );
echo '
<h2 style="color: #55ffff;">Notas rapidas</h2>
<form method="post">
<textarea name="nota" style=" font-size:24px;" rows="13" cols="43">'.$no.'</textarea>
<br>
<input type="submit" name="submit">
</form>
';
if ( isset( $_POST['nota'] ) ) {
    $data1 = $_POST['nota'];
    $file = fopen( 'nota.txt', "w" );
    fwrite( $file, $data1 );
    fclose( $file );
    header( "Refresh:0" );
}
?>
