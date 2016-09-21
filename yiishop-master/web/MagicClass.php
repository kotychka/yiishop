<?php

class MagicClass 
{
	public function __get($name) 
	{
		echo "__get ".$name."<br/>";
	}

	public function __set($name, $value)
	{
		echo "__set ".$name." ".$value."<br/>";	
	}

}