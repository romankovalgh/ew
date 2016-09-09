<?php

class FTXT{               //Объявили класс 
  
  public $the_file;            //Объявили, но неинициализировали свойство класса
  //public $n;            //Объявили, но неинициализировали свойство класса
  public $fcontents;            //Объявили, но неинициализировали свойство класса
  public $fnum_lines;            //Объявили, но неинициализировали свойство класса
  private $i=0;
  
  function __construct($text){   //Создаем метод класса, который устанавливает 
                              //значение его свойства my_name 
    $this->the_file=$text;     //Ключевое слово $this ссылается на сам объект 
  } 
  
  function set_file($text){   //Создаем метод класса, который устанавливает 
                              //значение его свойства my_name 
    $this->the_file=$text;     //Ключевое слово $this ссылается на сам объект 
  } 
  
  function read0(){
	$this->i=0;
	$f=fopen($this->the_file,"r+");
	$this->fcontents=file($this->the_file);
	$this->fnum_lines=count($this->fcontents);
	fclose($f);
	return $this->fcontents[0];
  }
  
  function read_next(){
	  ++$this->i; 
	  if ($this->i>$this->fnum_lines-1) {echo "Больше в файле ничего нет!";}
	  else return $this->fcontents[$this->i];
  }
  
/*  function plusplus(){
	 ++$this->n; 
  }*/

  
  function write(...$d){
	$difference=array_diff_key($this->fcontents, $d);
	if (count($difference)<>0) $d=array_merge($d, $difference); 
		
	$this->i=0;
	$str=implode("\r\n",$d);
	file_put_contents ( $this->the_file , $str , LOCK_EX  );
	
  }
  
   function w3rite(...$d){
	$this->i=0;
	$str=implode("\r\n",$d);
	file_put_contents ( $this->the_file , $str , LOCK_EX  );
	$difference=array_diff_key($this->fcontents, $d);
  }
  
  
  function rewrite(...$d){
	$this->i=0;
	$str=implode("\r\n",$d);
	file_put_contents ( $this->the_file , $str , LOCK_EX  );
  }
  
}
  
$person=new FTXT('1.txt');       //Создали экземпляр класса, т.е. объект
//$person->set_file('1.txt');    //
//echo $person->the_file.'<br>'; //
  
$n1=$person->read0();
echo $n1.'<br>';    //

$n2=$person->read_next();
echo $n2.'<br>';

$n3=$person->read_next();
echo $n3.'<br>';

$n3=(int)$n3;
++$n3;

$n2=(int)$n2;
++$n2;

$n1=(int)$n1;
++$n1;

$person->write($n1,$n2,$n3);  
$person->write($n1,$n2);  
//$person->write($n2);  
//$person->write($n3);  
  
?>

