<?php

class FTXT{ 
  
  public $the_file;            //имя файла
  //public $n;            
  public $fcontents;            //содержимое
  public $fnum_lines;            //колличество строк
  private $i=0;
  
  function __construct($text){   //конструктор, который устанавливает 
                              //значение его свойства the_file
    $this->the_file=$text;     
  } 
  
  function set_file($text){   //Создаем метод класса, который устанавливает 
                              //значение его свойства the_file
    $this->the_file=$text;     
  } 
  
  function read0(){								
	$this->i=0;									
	$f=fopen($this->the_file,"r+");				//открытие файла
	$this->fcontents=file($this->the_file);		//чтение из него строк в массив
	$this->fnum_lines=count($this->fcontents);	
	fclose($f);									//закрытие файла
	return $this->fcontents[0];					//возвращение первой строки
  }
  
  function read_next(){			//ф-ция по очереди возвращает строки файла
	  ++$this->i; 
	  if ($this->i>$this->fnum_lines-1) {echo "Больше в файле ничего нет!";}
	  else return $this->fcontents[$this->i];
  }
  
/*  function plusplus(){
	 ++$this->n; 
  }*/

  
  function write(...$d){				//функция записывает данный в файл
	$difference=array_diff_key($this->fcontents, $d);//проверяет разницу между
	if (count($difference)<>0) $d=array_merge($d, $difference);//переданными аргументами 
		//и начальным значением файла. Если есть разница, то оставляет неизменными 
	$this->i=0;//те значения, что не были изменены. 
	$str=implode("\r\n",$d);
	file_put_contents ( $this->the_file , $str , LOCK_EX  );
	
  }
  
   function w3rite(...$d){//удалить эту функцию
	$this->i=0;
	$str=implode("\r\n",$d);
	file_put_contents ( $this->the_file , $str , LOCK_EX  );
	$difference=array_diff_key($this->fcontents, $d);
  }
  
  
  function rewrite(...$d){//функция перезаписи. Стирает предыдущую запись в файл
	$this->i=0;//и записывает новые записи
	$str=implode("\r\n",$d);
	file_put_contents ( $this->the_file , $str , LOCK_EX  );
  }
  
}
  
$obj=new FTXT('1.txt');       //
//$obj->set_file('1.txt');    //
//echo $obj->the_file.'<br>'; //
  
$n1=$obj->read0();
echo $n1.'<br>';    //

$n2=$obj->read_next();
echo $n2.'<br>';

$n3=$obj->read_next();
echo $n3.'<br>';

$n3=(int)$n3;
++$n3;

$n2=(int)$n2;
++$n2;

$n1=(int)$n1;
++$n1;

$obj->write($n1,$n2,$n3);  
$obj->write($n1,$n2);  
//$obj->write($n2);  
//$obj->write($n3);  
  
?>

