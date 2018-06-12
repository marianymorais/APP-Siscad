<?php

require "Semesters.php" ;
require "Matter.php" ;


class SemestersDao
{
	public function __construct(){}

	public static function getSemesters()
	{
	
		//$json = file_get_contents("mariany.json");

		//$json = json_decode($json, true);

		if(!isset($_SESSION['json'])) return;

		$json = $_SESSION['json'];
		$listSemestres = array();

		krsort($json);


		foreach($json as $semestre => $vetDisciplinas){
			$semesters = new Semesters();
			$semesters->setName($semestre);
			$listMaterias = array();

			foreach($vetDisciplinas as $key => $infoDisciplina)
			{
				$materias = new Matter();
				$materias->setName($infoDisciplina["nome"]);
				$materias->setCode($infoDisciplina["codigo"]);
				$listNotas = array();

				if (isset($infoDisciplina["notas"])){
					foreach($infoDisciplina["notas"] as $tipoProva => $nota)
					{
						$listNotas[$tipoProva]["nota"] = $nota;
						$listNotas[$tipoProva]["media"] = $infoDisciplina["medias"][$tipoProva];
					}
				}

				$materias->setGrade($listNotas);
				$listMaterias[$infoDisciplina["nome"]] = $materias;
			}

			$semesters->setMatter($listMaterias);
			$listSemestres[$semestre] = $semesters;
		}
		return $listSemestres;
	}
	public static function getMatters(String $semes)
	{
		$listSemestres = array();
		$listSemestres = SemestersDao::getSemesters();

		return $listSemestres[$semes]->getMatter();	
	}

		public static function getGrades(String $semes, String $mat)
	{
		$listSemestres = array();
		$listSemestres = SemestersDao::getSemesters();
		$listSemestres = $listSemestres[$semes];
		$listSemestres = $listSemestres->getMatter();
		$listNotas = array();

		foreach ($listSemestres as $key => $value) 
		{	
			
			if ($value->getName() == $mat.'  ')
			{
				$listNotas = $value->getGrade();
			}
		}

		return $listNotas;	
	}

}

// $semes = "2016/1";
// $mat = "COMPUTAÇÃO E SOCIEDADE AP 68  ";
// $oi = SemestersDao::getGrades($semes, $mat);

// echo '<pre>';
// var_dump($oi);
// echo '</pre>';

// 	echo "<hr>Exibindo info de uma disciplina<br>";
// 		$disciplina = $oi["2016/1"];
// 		$disciplina = $disciplina->getMatter();
		