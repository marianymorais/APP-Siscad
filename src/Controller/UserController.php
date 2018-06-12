<?php

class UserController extends Controller
{
	public function __construct()
	{
		$this->view = new UserView();
	}
	public function indexAction()
	{
		return;
	}
	public function addAction()
	{	
		$message = Message::singleton();
		
		$viewModel = array();
		
		if(array_key_exists ('save', $_REQUEST))
		{
			$name =  array_key_exists ('name', $_REQUEST) ? $_REQUEST['name'] : '';
			
			$email =  array_key_exists ('email', $_REQUEST) ? $_REQUEST['email'] : '';
			
			$password =  array_key_exists ('password', $_REQUEST) ? $_REQUEST['password'] : '';
			
			$active =  array_key_exists ('active', $_REQUEST) ? 1 : 0;
		  
		  	try
			{
				if(empty($name))
					throw new Exception('Preencha o campo Nome!');

				if(empty($email))
					throw new Exception('Preencha o campo Email!');

				if(empty($password))
					throw new Exception('Preencha o campo Senha!');
			
				$user = new User();
				$user->setName($name);
				$user->setEmail($email);
				$user->setPassword(md5($password));
				$user->setActive($active);
				
				$userDao = new UserDao();	
			
				if ($userDao->authenticateEmail( $email )) {
					
					$this->setRoute($this->view->getAddRoute());
				
					throw new Exception('Usuário com o e-mail [' . $email . '] já está cadastrado no sistema');
				}
			
				if($userDao->insert($user))
					$message->addMessage('Usuário adicionado com sucesso!');
								

				if(!isset($_SESSION['USER'])) {
					$this->setRoute($this->view->getAuthenticateRoute());

					$bookDao = new BookDao();	
						
					$viewModel = array(
						'books' => $bookDao->getRelevance(3),	
					);
				}
				else {
					$this->setRoute($this->view->getListRoute());
					$viewModel = array(
						'users' => $userDao->getAll(),
					);
				}
				
			}
			catch(Exception $e)
			{
				$this->setRoute($this->view->getAddRoute()); 
				
				$message->addWarning($e->getMessage());
			}
		}
		else
			$this->setRoute($this->view->getAddRoute()); 
		
		$this->showView($viewModel);

		return;
	}
	
	public function editAction()
	{	
		$message = Message::singleton();
		
		$id =  array_key_exists ('id', $_REQUEST) ? $_REQUEST['id'] : '';
		
		if(array_key_exists ('save', $_REQUEST))
		{
			$name =  array_key_exists ('name', $_REQUEST) ? $_REQUEST['name'] : '';
			
			$email =  array_key_exists ('email', $_REQUEST) ? $_REQUEST['email'] : '';
			
			$active =  array_key_exists ('active', $_REQUEST) ? 1 : 0;
			
			try
			{
				$user = new User();
				$user->setId($id);
				$user->setName($name);
				$user->setEmail($email);
				$user->setActive($active);
				
				$userDao = new UserDao();	
			
				if($userDao->update($user))
					$message->addMessage('Usuário adicionado com sucesso!');

				$viewModel = array(
					'users' => $userDao->getAll(),
				);
				
				$this->setRoute($this->view->getListRoute());		
			}
			catch(Exception $e)
			{
				$message->addWarning($e->getMessage());
			}
		}
		else
		{
			$userDao = new UserDao();
			
			$viewModel = array(
				'user' => $userDao->getUser($id),
			);
			
			$this->setRoute($this->view->getEditRoute());
		}

		$this->showView($viewModel);

		return;
	}
	
	public function passAction()
	{	
		$message = Message::singleton();
		
		$viewModel = array();
		
		$userDao = new UserDao();
		
		$id =  array_key_exists ('id', $_REQUEST) ? $_REQUEST['id'] : '';		
		
		if(array_key_exists ('save', $_REQUEST))
		{
			
			$password =  array_key_exists ('password', $_REQUEST) ? $_REQUEST['password'] : '';
		  
			$newPassword =  array_key_exists ('newpassword', $_REQUEST) ? $_REQUEST['newpassword'] : '';
		  
			$rePassword =  array_key_exists ('repassword', $_REQUEST) ? $_REQUEST['repassword'] : '';
		  
		  	try
			{
				if(empty($id))
					throw new Exception('Ocorreu um erro!');

				if(empty($password))
					throw new Exception('Preencha o campo Senha Atual!');

				if(empty($newPassword))
					throw new Exception('Preencha o campo Nova Senha!');					
					
				if(empty($rePassword))
					throw new Exception('Preencha o campo Confirmar Senha!');
			
				if ($newPassword != $rePassword)
					throw new Exception('As senhas informadas não conferem!');
			
				$user = $userDao->getUser($id);
				
				if ($userDao->authenticate($user->getEmail(), md5($password)) == NULL )
					throw new Exception('A senha atual esta incorreta');
			
				$user->setPassword(md5($newPassword) );
			
				if($userDao->passUpdate( $user ))
					$message->addMessage('Senha alterada com sucesso!');
				
				$viewModel = array(
					'users' => $userDao->getAll(),
				);
				
				$this->setRoute($this->view->getListRoute());
			}
			catch(Exception $e)
			{
				$viewModel = array(
					'user' => $userDao->getUser($id),
				);
			
				$this->setRoute($this->view->getPassRoute());
				
				$message->addWarning($e->getMessage());
			}
		}
		else
		{
			$viewModel = array(
				'user' => $userDao->getUser($id),
			);
			
			$this->setRoute($this->view->getPassRoute());
		}
		
		$this->showView($viewModel);

		return;
	}	
	
	
	public function listAction()
	{	
		$userDao = new UserDao();	
	
		$this->setRoute($this->view->getListRoute());
		
		$viewModel = array(
			'users' => $userDao->getAll(),
		);
		
		$message = Message::singleton();
		
		$message->addMessage('Lista de usuários carregada com sucesso!');
		
		$this->showView($viewModel);
		
		return;
	}
	
	
	public function deleteAction()
	{	
		$userDao = new UserDao();	
	
		$id =  array_key_exists ('id', $_REQUEST) ? $_REQUEST['id'] : '';
		
		$userDao->delete($id);
		
		$this->setRoute($this->view->getListRoute());
		
		$viewModel = array(
			'users' => $userDao->getAll(),
		);
		
		$message = Message::singleton();
		
		$message->addMessage('Lista de usuários carregada com sucesso!');
		
		$this->showView($viewModel);
		
		return;
	}

}