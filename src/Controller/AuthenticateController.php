<?php

class AuthenticateController extends Controller
{
	public function __construct()
	{
		$this->view = new AuthenticateView();
	}
	public function indexAction()
	{
		return;
	}
	public function logonAction()
	{
		$authenticateDao = new AuthenticateDao();
		
		$message = Message::singleton();
		
		$email =  array_key_exists ('email', $_REQUEST) ? $_REQUEST['email'] : '';
			
		$password =  array_key_exists ('password', $_REQUEST) ? $_REQUEST['password'] : '';
		
		if(($user = $authenticateDao->authenticate(trim($email), md5(trim($password)))))
		{	
			$_SESSION['USER'] = serialize($user); 
			
			$message->addMessage('Usuário Autenticado com sucesso!');
		}
		else
		{
			$message->addWarning('Usuário ou senha incorretos!');
		
		}
		
		$this->setRoute($this->view->getIndexRoute());

		$bookDao = new BookDao();	
	
		$viewModel = array(
			'books' => $bookDao->getNewest(3),	
		);

		$this->showView($viewModel);
		
		return;
	}
	public function logoffAction()
	{
		if(isset($_SESSION['USER']))
			unset ($_SESSION['USER']);
		
		$bookDao = new BookDao();	
	
		$viewModel = array(
			'books' => $bookDao->getRelevance(3),	
		);

		$this->setRoute($this->view->getIndexRoute());
		
		$this->showView($viewModel);
		
		return;
	}
}