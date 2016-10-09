<!DOCTYPE html>
<html>
<head></head>
<body>
<form action="voc2.php" method="post">
 
<?php
//ПОЧАТОК БЛОКУ ВИЗНАЧЕННЯ МАСИВІВ, ЗМІННИХ І КОНСТАНТ
function fopen_read_close($fname){
	$f=fopen($fname,"r+");
	$a=file($fname);
	fclose($f);
	return $a;
}

$voc=fopen_read_close("lexicon.txt");
$knm=count($voc);


$q=[];//це темповський масив для запитання
$qst='';//це темповська змінна для запитання
//КІНЕЦЬ БЛОКУ ВИЗНАЧЕННЯ МАСИВІВ, ЗМІННИХ І КОНСТАНТ


//$randSelectQuestion="випадкове значення";
$randSelectQuestion=rand(0,$knm-1);
setcookie("randSelectQuestion", $randSelectQuestion, time() + 3600*24); 

$article=$voc[$randSelectQuestion];

$eng=stristr($article, '[', true);
$eng=rtrim($eng);

$article=str_replace($eng, '' , $article );

$tr=stristr($article, ']', true);//вирізає строку до символа ']' не включаючи його
$tr.=']';

$article=str_replace($tr, '' , $article );//видаляє те слово, що вже опрацьовано
$article=substr($article,4);//удаляет первые 4 символы

/*$ru=stristr($article, ',', true);//вырезаем первое слово до запятой
if(!ru) $ru=stristr($article, '.', true);//якщо коми не було, то вирізаємо до точки
else{
	$ru2=stristr($article, ',', true);//якщо кома була, то вирізаємо друге слово до коми
	if(!ru2) $ru2=stristr($article, '.', true);//якщо коми не було, то вирізаємо до точки друге слово
	else 
	$ru3=stristr($article, '.', true);//якщо кома була, то вирізаємо третє слово до точки
	if(!ru) $ru3=повністю зоставшуюся строку;//якщо точки не було, то вирізаємо друге слово
	
}*/
//echo $eng."HHH<br>";
//echo $tr."HHH<br>";
$words=explode(', ',$article);//Разъединяет строку на элементы массива с помощью строки ', '
$words[count($words)-1]=substr($words[count($words)-1],0,-3);//видаляємо із останнього слова статті символ точку і пробіл (разом із переносом рядка)
echo "останній елемент масиву: ".$words[count($words)-1]."<br>";
2e

array_unshift($words, $eng, $tr);
foreach($words as $v){
	echo $v."HHH<br>";
}  

$gamma=rand(0,7);

$q=[$e[$randSelectQuestion],$t[$randSelectQuestion],$u[$randSelectQuestion],$u2[$randSelectQuestion],$u3[$randSelectQuestion],$r[$randSelectQuestion],$r2[$randSelectQuestion],$r3[$randSelectQuestion]];
$qu=array_unique($q);
$articleToString=implode('<br>',$qu);//Объединяет элементы массива с помощью строки '<br>'


setcookie("articleToString", $articleToString, time() + 3600*24); 

$qst=$q[$gamma]; echo $qst."&emsp;";

?>
<p>Введіть це слово:&emsp;</p>
<p><input type="text" name="question" /></p>
 
<p>Перекладіть:&emsp;</p>
<p><input type="text" name="answer" /></p>
 
 <p><input type="submit" /></p>
</form>
</body>
</html>
