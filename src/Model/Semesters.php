<?php

class semesters
{
	private $name;
	private $matter;

	public function __construct()
	{

	}
	
	public function setName($name)
	{
		$this->name = $name;
	}
	public function getName()
	{
		return $this->name;
	}
	public function setMatter($matter)
	{
		$this->matter = $matter;
	}
	public function getMatter()
	{
		return $this->matter;
	}

}