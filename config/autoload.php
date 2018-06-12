<?php

function __autoload($class)
{
	switch($class)
	{
		case 'Controller': 
			require_once('system/Controller.php');
			break;
		case 'Message': 
			require_once('system/Message.php');
			break;
		case 'IndexController': 
			require_once('src/Controller/IndexController.php');
			break;
		case 'AuthenticateController': 
			require_once('src/Controller/AuthenticateController.php');
			break;
		case 'IndexView': 
			require_once('src/View/IndexView.php');
			break;
		case 'UserController': 
			require_once('src/Controller/UserController.php');
			break;
		case 'SemestersController': 
			require_once('src/Controller/SemestersController.php');
			break;
		case 'MattersController': 
			require_once('src/Controller/MattersController.php');
			break;
		case 'GradesController': 
			require_once('src/Controller/GradesController.php');
			break;
		case 'UserView': 
			require_once('src/View/UserView.php');
			break;
		case 'SemestersView': 
			require_once('src/View/SemestersView.php');
			break;
		case 'MattersView': 
			require_once('src/View/MattersView.php');
			break;
		case 'GradesView': 
			require_once('src/View/GradesView.php');
			break;
		case 'AuthenticateView': 
			require_once('src/View/AuthenticateView.php');
			break;
		case 'User': 
			require_once('src/Model/User.php');
			break;
		case 'Semesters': 
			require_once('src/Model/Semesters.php');
			break;
		case 'Matters': 
			require_once('src/Model/Matters.php');
			break;
		case 'UserDao': 
			require_once('src/Model/UserDao.php');
			break;
		case 'SemestersDao': 
			require_once('src/Model/SemestersDao.php');
			break;
		case 'AuthenticateDao': 
			require_once('src/Model/AuthenticateDao.php');
			break;
		case 'Database': 
			require_once('system/Database.php');
			break;
	}
}