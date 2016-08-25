<?php

interface MyInterface{
	public function myMethod($value);
}

/**
* 
*/
class MyClass implements MyInterface
{
	private $sum = 0;
	private $arr = array();

	public function checkarray($val)
	{
		foreach ($val as $i)
		{
			if(!is_array($i))
			{
				array_push($this->arr, $i);
			}
			else
			{
				$this->checkarray($i);
			} 
		}

		return $this->arr;
	}
	
	public function myMethod($value)
	{

		$val = $this->checkarray($value);
		array_map(function($i){
			if ($i % 5 == 0 && $i % 3 != 0)
			{
				$this->sum = $this->sum + $i;
			}
		},$val);

		echo $this->sum;
	}
}

/**
* 
*/


$a = new MyClass;

$a->myMethod([3,5,15,[4,75,[25]]]);
?>

