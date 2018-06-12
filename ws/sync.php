<?php
try{
	
	$token= (array_key_exists('token', $_REQUEST) &&  $_REQUEST['token'] == 'vitor2017') ? true : false;

	if(!$token)
		throw new Exception('Invalid Token');

	$db = Database::singleton();
	
	$sql = 'SELECT * FROM __user';
	
	$sth = $db->prepare($sql);
	
	$sth->execute();
	
	$users = array();
	
	while($obj = $sth->fetch(PDO::FETCH_OBJ))
	{
		$users[$obj->id]['id'] = $obj->id;
		$users[$obj->id]['name'] = $obj->name;
		$users[$obj->id]['email'] = $obj->email;
	}
	
	echo json_encode($users);
}
catch(Exception $e)
{
	error_log($e->getMessage());

	die($e->getMessage());	
}
catch(PDOException $e)
{
	error_log($e->getMessage());
}