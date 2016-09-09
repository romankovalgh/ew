<!DOCTYPE html>
<html>
<head></head>
<body>
<form action="voc1.php" method="post">

<?php
//ПОЧАТОК БЛОКУ ВИЗНАЧЕННЯ МАСИВІВ, ЗМІННИХ І КОНСТАНТ
function fopen_read0_close($fname){
	$f=fopen($fname,"r+");
	$a=file($fname);
	$a=$a[0];
	fclose($f);
	return $a;
}

$N=fopen_read0_close("n.txt");//кількість питань

$N_pr=fopen_read0_close("n_pr.txt");

$Nn=fopen_read0_close("nn.txt");

function fopen_write_close($fname, $data){
	$f=fopen($fname,"w");
	fwrite($f, $data);
	fclose($f);
}
//КІНЕЦЬ БЛОКУ ВИЗНАЧЕННЯ МАСИВІВ, ЗМІННИХ І КОНСТАНТ


$reply=htmlspecialchars($_POST['rpl']);//відповідь
//$wrd=htmlspecialchars($_POST['wrd']);
fopen_write_close("n.txt", ++$N);
	

$beta=(int)$_COOKIE['beta'];
$stqb=$_COOKIE['stq']; $vrpl=explode('<br>',$stqb);

function printwords(){
	global $stqb;
	echo $stqb."<br><br>";
}

$is_here=stripos(trim($stqb), $reply);//чи входить наша відповідь в рядок із набору слов статті

if ($is_here===false){ //Це правильно написано. Для цієї ф-ції(stripos) треба '===' використовувати! І порівнювати лише з false
	echo "<br>Неправильно!!!<br><br>";
	fopen_write_close("nn.txt", ++$Nn);
	echo "<br><em>Правильні відповіді:</em> <br><br>";
}else{
	echo "<br>Правильно!!!<br><br>";
	fopen_write_close("n_pr.txt", ++$N_pr);
}
printwords();

echo "<em><br>Кількість запитань:</em> ".$N.'<br>';
echo "<em>Кількість правильних відповідей:</em> ".$N_pr.'<br>';
echo "<em>Кількість неправильних відповідей:</em> ".$Nn.'<br>';
?>

 <p>Будете продовжувати?:&emsp;
 <input type="text" name="aaa" /></p>
 
 <p><input type="submit" /></p>
</form>
</body>
</html>