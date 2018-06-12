<?php

class matter
{
	private $code;
	private $name;
	private $grade = array();
	
	public function __construct()
	{

	}
	
	public function setCode($code)
	{
		$this->code = $code;
	}
	public function getCode()
	{
		return $this->code;
	}
	public function setName($name)
	{
		$this->name = $name;
	}
	public function getName()
	{
		return $this->name;
	}
	public function setGrade($grade)
	{
		$this->grade = $grade;
	}
	public function getGrade()
	{
		if(empty($this->grade))
			return 'No grade';

		return $this->grade;
	}
}