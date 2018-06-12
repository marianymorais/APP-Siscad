<?php
try
{
	require ('config/autoload.php');

	//$book =  new BookDao();

	//var_dump($book->getNewest());
	
	session_start();

	$target = !isset($_REQUEST['target']) ? NULL : $_REQUEST['target'];
	$virg = ",";
	$adir = "\"";
	switch($target)
	{
		
		case 'ws':
			
			$service = !isset($_REQUEST['service']) ? NULL : $_REQUEST['service'];
			
			if(!$service)
				throw new Exception('Invalid Service.');
			
			switch($service)
			{
				case 'sync': require ('ws/sync.php'); break;
					
				default: break;
			}
			
			break;
		
		default:
			
			$_REQUEST['controller'] = !isset($_REQUEST['controller']) ? 'Index' : $_REQUEST['controller'];

			$_REQUEST['action'] = !isset($_REQUEST['action']) ? 'index' : $_REQUEST['action'];		

			$seme = $_REQUEST['seme'] = !isset($_REQUEST['seme']) ? '' : $_REQUEST['seme'];	

			$mat = $_REQUEST['mat'] = !isset($_REQUEST['mat']) ? '' : $_REQUEST['mat'];	

			eval('$controller = new ' . $_REQUEST['controller'] . 'Controller();');

			eval('$controller->'.$_REQUEST['action'].'Action("'.$seme.'"'.$virg.$adir.$mat.$adir.');');
			
			


			break;
	}
	
}
catch(Exception $e)
{
	error_log($e->getMessage());
}