<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="etur.php" method="post">
<?php
$eng=htmlspecialchars($_POST['eng']);
//echo "eng: ".$eng."<br>";
$tr=htmlspecialchars($_POST['tr']);
$ua=htmlspecialchars($_POST['ua']);
$ua2=htmlspecialchars($_POST['ua2']);
$ua3=htmlspecialchars($_POST['ua3']);
$ru=htmlspecialchars($_POST['ru']);
$ru2=htmlspecialchars($_POST['ru2']);
$ru3=htmlspecialchars($_POST['ru3']);
//echo "tr: ".$tr."<br>";
//echo "ua: ".$ua."<br>";
//echo "ru: ".$ru."<br>";
function fopenab_write_close($fname, $data){
	$f=fopen($fname,"ab");
	fwrite($f, $data);
	fclose($f);
}

fopenab_write_close('1e.txt', $eng."\r\n");
fopenab_write_close('1t.txt', $tr."\r\n");
fopenab_write_close('1u.txt', $ua."\r\n");
fopenab_write_close('1u2.txt', $ua2."\r\n");
fopenab_write_close('1u3.txt', $ua3."\r\n");
fopenab_write_close('1r.txt', $ru."\r\n");
fopenab_write_close('1r2.txt', $ru2."\r\n");
fopenab_write_close('1r3.txt', $ru3."\r\n");


?>
<p>Продовжувати?</p>
<p><input type="text" name="yesno" /></p>
<p><input type="submit" /></p>
</form>
</form>
</body>
</html>
