<?php

class b
	{
	public function b()
		{
		echo " creating object only";
		}

	public function a($name)
		{
		echo "<br />";
		echo "hello ".$name;
		}
	}	
	
$aa=new b();
$aa->a('check');
?>


<?php

public class a
{
//public $v = 100;
//public $b= 23;


public function check1()
{
}

public function check($s,$g)
{
echo " hi $s and $g";
}
}
$z=new check1();
$z->check('100','200');
?>

<?php
/*class myHappyBox {

    var $box_height = 100;
    var $box_width = 100;
    var $box_color = '#EC0000';

    function myHappyBox(){
    }

    function setHeight($value){
        $this->box_height=$value;
    }
    function setWidth($value){
        $this->box_width=$value;
    }
    function setColor($value){
        $this->box_color=$value;
    }

    function displayBox(){
        echo sprintf('
            <div style="height:%spx;width:%spx;background-color:%s"> </div>',$this->box_height,$this->box_width,$this->box_color);
    }
}
$box=new myHappyBox();
$box->displayBox();*/
?> 	
