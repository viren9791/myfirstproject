<?php

class demo 
{

public $prop=array();


public function __get($data)
	{
	//	echo "<br/>data :".$this->prop[$data];
		echo "<br/>check :".$data;
		
	}
	public function __set($data,$value)
	{

		echo "<br/>Data is :".$data;
		echo "<br/>This is the Value of data : ". $value;
	  //$this->prop[$dat]=$value;
	}
}
$a=new demo();

$a->Maitrak=22;
$a->Maitrak;

?>
