<?php

echo " : : :.........Polymorohism..........: : :  <br/>";


class shape
{

public $a,$b,$c,$area1;

	public function area($a,$b)
	{
	
		$area1= $a*$b;
		echo "	 Area of square is:  ".$area1;
		echo "</pre>";
	}
}

class show extends shape
{	
	public function area($a,$b,$c)
	{
		$area1= $a*$b*$c;
		echo "<br/>Area of cube is :  ".$area1;
	}
}

$square= new shape();
$cube=new show();

$square->area(10,20);
$cube->area(1,2,3);

?>
