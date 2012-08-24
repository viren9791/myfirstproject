<?php

class b
{	
	public function a($name)
		{
			echo "hello... := 	 ".$name;
			$this->fname=$name;
			echo "<br/>";
		}
		
	public function setdata ()
		{
			echo "checking data print :: ". $this->fname;
			echo "<br/>";
			echo "<br/>";
		}
}	
	
$aa=new b();
$aa->a('Maitrak');
$aa->setdata();

$ac=new b();
$ac->a('Modi');
$ac->setdata();

?>

<?php

class  my()
{
	public $name;
	private $ar=array(1,2,3,4);
	
	public function __set($a,$b)
		{
			$this->ar[$a]=$b;
		}
	public function __get($a);
		{
			return $this->ar[$a];
		}
}x
$c=new my();
$c->name= 'maitrak';
?>
