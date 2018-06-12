<?php

class Controller
{
	private $view = false;
	
	private $route;

	public function __contruct(){}
	
	public function showView($viewModel = false)
	{
		if($viewModel)
			foreach ($viewModel as $key => $value)
				eval('$'.$key. ' = $value;');
		
		$_USER = isset($_SESSION['USER']) ? unserialize($_SESSION['USER']) : false; 

		if($this->getRoute() == 'index/index.php')
		{
			include('view/index/header2.php');		
		
			include("view/".$this->getRoute());
		
			include('view/index/footer.php');
		}else
		{
			include('view/index/header.php');		
		
			include("view/".$this->getRoute());
		
			include('view/index/footer.php');
		}

		
	}
	public function getView()
	{
		return $this->view;
	}
	public function setRoute($route)
	{
		$this->route = $route; 
	}
	public function getRoute()
	{
		return $this->route;
	}
}