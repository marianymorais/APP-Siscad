<?php

class GradesController extends Controller
{
	private $user;

	public function __construct()
	{
		$this->view = new GradesView();
		
		$this->user = isset($_SESSION['USER']) ? unserialize($_SESSION['USER']) : false;
	}
	public function indexAction()
	{
		return;
	}
	
	public function gradAction(String $seme, String $mat)
	{	
		$semestersDao = SemestersDao::getGrades($seme, $mat);	
	
		$this->setRoute($this->view->getListRoute());
		
		// echo '<br><br><br><br><br>';
		// echo '<pre>';
		// var_dump($semestersDao);
		// echo '</pre>';

		$viewModel = array(
			'grades' => $semestersDao,
			'seme' => $seme,
			'mat' => $mat,
		);
		
		$message = Message::singleton();
		
		$message->addMessage('Lista de notas carregada com sucesso!');
		
		$this->showView($viewModel);
		
		return;
	}

}