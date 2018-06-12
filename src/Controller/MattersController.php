<?php

class MattersController extends Controller
{
	private $user;

	public function __construct()
	{
		$this->view = new MattersView();
		
		$this->user = isset($_SESSION['USER']) ? unserialize($_SESSION['USER']) : false;
	}
	public function indexAction()
	{
		return;
	}
	
	public function matAction(String $seme)
	{	
		$semestersDao = SemestersDao::getMatters($seme);	
	
		$this->setRoute($this->view->getListRoute());
		
		$viewModel = array(
			'matters' => $semestersDao,
			'seme' => $seme,
		);
		
		$message = Message::singleton();
		
		$message->addMessage('Lista de materias carregada com sucesso!');
		
		$this->showView($viewModel);
		
		return;
	}

}