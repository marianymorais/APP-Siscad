<?php

class IndexView
{
	private $route = 'index/index.php';
	
	public function __contruct(){}
	
	public function getIndexRoute()
	{
		return 'index/index.php';
	}
	public function getLogonRoute()
	{
		return 'authenticate/logon.php';
	}
}