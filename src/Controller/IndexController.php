<?php

class IndexController extends Controller
{
	private $view = false;
	
	public function __construct()
	{
		$this->view = new IndexView();
	}
	public function indexAction()
	{

		$semestersDao = SemestersDao::getSemesters();

		$this->setRoute($this->view->getIndexRoute());
		
		$viewModel = array(
			'semesters' => $semestersDao,	
		);

		$this->showView($viewModel);
		
		return;

	}
	public function getView()
	{
		return $this->view;
	}
	public function logoffAction()
	{
		if(isset($_SESSION['json']))
			unset ($_SESSION['json']);
		
		$semestersDao = SemestersDao::getSemesters();

		$this->setRoute($this->view->getIndexRoute());
		
		$viewModel = array(
			'semesters' => $semestersDao,	
		);

		$this->showView($viewModel);
		
		return;
	}
}