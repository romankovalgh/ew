<!DOCTYPE html>
<html>
<head></head>
<body>
<form action = "voc1.php" method = "post">

<?php
//ПОЧАТОК БЛОКУ ВИЗНАЧЕННЯ МАСИВІВ, ЗМІННИХ І КОНСТАНТ
//КІНЕЦЬ БЛОКУ ВИЗНАЧЕННЯ МАСИВІВ, ЗМІННИХ І КОНСТАНТ

$N = openRead0CloseF("n.txt"); //кількість питань
$N_pr = openRead0CloseF("n_pr.txt");
$Nn = openRead0CloseF("nn.txt");

$reply = htmlspecialchars( $_POST['rpl'] ); //відповідь
//$wrd = htmlspecialchars( $_POST['wrd'] );
openWriteCloseF("n.txt", ++$N);

$beta = (int) $_COOKIE['beta'];
$stArticle = $_COOKIE['stq']; 

$is_here = checkEnteringАrticle( trim($stArticle), $reply); //чи входить наша відповідь
// в рядок із набору слов статті

displayingResult($is_here);

printWords($stArticle);

echo "<em><br>Кількість запитань:</em> " . $N . '<br>';
echo "<em>Кількість правильних відповідей:</em> " . $N_pr . '<br>';
echo "<em>Кількість неправильних відповідей:</em> " . $Nn . '<br>';


//ПОЧАТОК БЛОКУ ВИЗНАЧЕННЯ ФУНКЦІЙ

/**
 * Отрывает файл, читает первую строчку, закрывает файл
 *
 * @param {string} $fname Имя функции
 * @return {string} $a содержимое первой строчки файла
*/
function openRead0CloseF($fname) {
	$f = fopen($fname, "r+");
	
	$a = file($fname);
	$a = $a[0];
	
	fclose($f);
	return $a;
}


/**
 * Записывает в текстовый файл строку
 * @param {string} $fname Имя функции
 * @param {string} $data Записываемая строка
*/
function openWriteCloseF($fname, $data) {
	$f = fopen($fname, "w");
	fwrite($f, $data);
	fclose($f);
}	

/**
 * Просто выводит переменную на экран
 * @param {string} $printVar Имя выводимой перемой на экран
 */	
function printWords($printVar) {
	echo $printVar . "<br><br>";
}

/**
 * Перевіряє чи входить наша відповідь в рядок із набору слов статті
 * @param {string} $article Стаття словника
 * @param {string} $reply Наша відповідь
 * @return {boolean} Якщо відповідь не міститься в статті - виводе false,
 * інакше виводить позицію першого входження $reply в $article
 */
function checkEnteringАrticle($article, $reply) {
	return stripos( trim($article), $reply);
}

/**
 * Якщо відповіді немає в статті - то виводе, що неправильна відповідь
 * А також збільшує кількість неправильних відповідів в файлі n_pr.txt
 * Також виводить рядок "Правильні відповіді:"
 * якщо відповідь правильна - виводе, що правильно
 * і збільшує кількість правильних відповідів в файлі nn.txt
 * @param {boolean or integer} $check маркер? що показує
 * чи входить відповідь у статтю. false - ні, число 0 чи більше - так
 */
function displayingResult($check) {
	global $Nn, N_pr;
	
	if ($check === false) { //Це правильно написано. Для цієї ф-ції(stripos)
	//	треба '===' використовувати! І порівнювати лише з false
		echo "<br>Неправильно!!!<br><br>";
		openWriteCloseF("nn.txt", ++$Nn);
		echo "<br><em>Правильні відповіді:</em> <br><br>";
	} else {
		echo "<br>Правильно!!!<br><br>";
		openWriteCloseF("n_pr.txt", ++$N_pr);
	}
}
//КІНЕЦЬ БЛОКУ ВИЗНАЧЕННЯ ФУНКЦІЙ
?>


 <p>Будете продовжувати?:&emsp;
 <input type = "text" name = "aaa" /></p>
 
 <p><input type = "submit" /></p>
</form>
</body>
</html>