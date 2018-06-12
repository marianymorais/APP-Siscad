<?php

set_time_limit(0);

class SemestersController extends Controller
{
	private $user;

	public function __construct()
	{
		$this->view = new SemestersView();
		
		$this->user = isset($_SESSION['USER']) ? unserialize($_SESSION['USER']) : false;
	}
	public function indexAction()
	{
		return;
	}
	
	public function semAction()
	{	
		if(!isset($_SESSION['json'])){
			$rga = $_REQUEST["rga"];
			$pass = $_REQUEST["pass"];
			$json = file_get_contents("http://websensor.facom.ufms.br/siscadapp/?rga=$rga&pass=$pass");
			$json = json_decode($json,true);
			$_SESSION['json'] = $json;
		}


		$semestersDao = SemestersDao::getSemesters();	
	
		$this->setRoute($this->view->getListRoute());
		
		$viewModel = array(
			'semesters' => $semestersDao,
		);
		
		$message = Message::singleton();
		
		$message->addMessage('Lista de semestres carregada com sucesso!');
		
		$this->showView($viewModel);
		
		return;
	}


}