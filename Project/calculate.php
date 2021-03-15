<?php
	//Voer hier een tweedimensionale array in met de resultaten
	function sortResultsByLlnr($results)
	{
		$resultsByLlnr = [];
		
		while (isset($results[80]))
		{
			$subResultsByLlnr = [];
			
			for ($i = 0; $i < 80; $i++)
			{
				array_push($subResultsByLlnr, $results[$i]);
			}
			
			array_splice($results, 0, 80);
			
			array_push($resultsByLlnr, $subResultsByLlnr);
		}
		
		return $resultsByLlnr;
	}
	
	//Voer hier een tweedimensionale array in, waar de resultaten van één leerlingnummer uit te halen zijn.
	class Normering
	{
		public $leertaakgerichtheid = ["000000011111111223345567", "000000011111112233455678" ];
		public $concentratie = ["000000011222334445566678", "000000011122334455566778" ];
		public $huiswerkattitude = ["000000011111112223445567", "000000011111222334445667" ];
		public $plezierOpSchool = ["000000011111111122234456", "000000011111111223344556" ];
		public $sociaalAanvaardVoelen = ["000000011111111122233456", "000000011111111222334456" ];
		public $relatieMetDocenten = ["000000011111122234455678", "000000011111122334456678" ];
		public $uitdrukkingsvaardigheid = ["000000011112223344556678", "000000011112223344556678" ];
		public $zelfvertrouwenProefwerk = ["000000011122334455667789", "000000011112233445566789" ];
		public $socialeVaardigheid = ["000000011112223344556778", "000000011111112233455678" ];
		public $socialeWenselijkheid = ["000000012234456677889999", "000000012334556677889999" ];
		public $definiteResults;
		
		function __construct($results)
		{
			$data = $this->alterResults($results);
			$results = $this->calculatePoints($data);
			$this->llnr = $data[0][0];
			
			$normC = $this->readNormering("leertaakgerichtheid", $this->leertaakgerichtheid[0], $this->leertaakgerichtheid[1]);
			$normH = $this->readNormering("concentratie", $this->concentratie[0], $this->concentratie[1]);
			$normL = $this->readNormering("huiswerkattitude", $this->huiswerkattitude[0], $this->huiswerkattitude[1]);
			$normP = $this->readNormering("plezierOpSchool", $this->plezierOpSchool[0], $this->plezierOpSchool[1]);
			$normR = $this->readNormering("sociaalAanvaardVoelen", $this->sociaalAanvaardVoelen[0], $this->sociaalAanvaardVoelen[1]);
			$normS = $this->readNormering("relatieMetDocenten", $this->relatieMetDocenten[0], $this->relatieMetDocenten[1]);
			$normU = $this->readNormering("uitdrukkingsvaardigheid", $this->uitdrukkingsvaardigheid[0], $this->uitdrukkingsvaardigheid[1]);
			$normV = $this->readNormering("zelfvertrouwenProefwerk", $this->zelfvertrouwenProefwerk[0], $this->zelfvertrouwenProefwerk[1]);
			$normW = $this->readNormering("socialeVaardigheid", $this->socialeVaardigheid[0], $this->socialeVaardigheid[1]);
			$normZ = $this->readNormering("socialeWenselijkheid", $this->socialeWenselijkheid[0], $this->socialeWenselijkheid[1]);
			
			$this->definiteResults = 
			[
				$this->calculateNormering($normC, $results[0], $data[0][1]),
				$this->calculateNormering($normH, $results[1], $data[0][1]),
				$this->calculateNormering($normL, $results[2], $data[0][1]),
				$this->calculateNormering($normP, $results[3], $data[0][1]),
				$this->calculateNormering($normR, $results[4], $data[0][1]),
				$this->calculateNormering($normS, $results[5], $data[0][1]),
				$this->calculateNormering($normU, $results[6], $data[0][1]),
				$this->calculateNormering($normV, $results[7], $data[0][1]),
				$this->calculateNormering($normW, $results[8], $data[0][1]),
				$this->calculateNormering($normZ, $results[9], $data[0][1]),
			];
		}
		
		function alterResults($results)
		{
			$newResults = [];
			
			for ($i = 0; $i < 80; $i++)
			{
				$subResults = [$results[$i]['llnr'], $results[$i]['geslacht'], $results[$i]['ID'], $results[$i]['Categorie']];
				
				if($results[$i]['Soort'] == 1)
				{
					if ($results[$i]['antwoord'] == 0)
					{
						$points = 3;
					}
					elseif ($results[$i]['antwoord'] == 1)
					{
						$points = 2;
					}
					else
					{
						$points = 1;
					}	
				}
				else
				{
					if ($results[$i]['antwoord'] == 0)
					{
						$points = 1;
					}
					elseif ($results[$i]['antwoord'] == 1)
					{
						$points = 2;
					}
					else
					{
						$points = 3;
					}	
				}
				
				array_push($subResults, $points);
				
				array_push($newResults, $subResults);
			}
			
			return $newResults;
		}
		
		public function calculatePoints($results)
		{
			$pointsConcentration = 0;
			$pointsHomework = 0;
			$pointsLearning = 0;
			$pointsFun = 0;
			$pointsRelationship = 0;
			$pointsSocialAcceptance = 0;
			$pointsExpression = 0;
			$pointsSocialAbility = 0;
			$pointsSocial = 0;
			$pointsConfidence = 0;
			
			for ($i = 0; $i < 80; $i++)
			{
				if ($results[$i][3] == "C")
				{
					$pointsConcentration += $results[$i][4];
				}
				elseif ($results[$i][3] == "H")
				{
					$pointsHomework += $results[$i][4];
				}
				elseif ($results[$i][3] == "L")
				{
					$pointsLearning += $results[$i][4];
				}
				elseif ($results[$i][3] == "P")
				{
					$pointsFun += $results[$i][4];
				}
				elseif ($results[$i][3] == "R")
				{
					$pointsRelationship += $results[$i][4];
				}
				elseif ($results[$i][3] == "S")
				{
					$pointsSocialAcceptance += $results[$i][4];
				}
				elseif ($results[$i][3] == "U")
				{
					$pointsExpression += $results[$i][4];
				}
				elseif ($results[$i][3] == "V")
				{
					$pointsSocialAbility += $results[$i][4];
				}
				elseif ($results[$i][3] == "W")
				{
					$pointsSocial += $results[$i][4];
				}
				else
				{
					$pointsConfidence += $results[$i][4];
				}
			}
			
			$points = 
			[
				[$pointsConcentration, "C"],
				[$pointsHomework, "H"],
				[$pointsLearning, "L"],
				[$pointsFun, "P"],
				[$pointsRelationship, "R"],
				[$pointsSocialAcceptance, "S"],
				[$pointsExpression, "U"],
				[$pointsSocialAbility, "V"],
				[$pointsSocial, "W"],
				[$pointsConfidence, "Z"],
			];
			
			return $points;
		}
		
		public function readNormering($name, $tabelV, $tabelM)
		{
			$normeringen = [$name];
			$subNormeringenV = [];
			$subNormeringenM = [];
			
			for ($i = 0; $i < 24; $i++)
			{
				$normV = [$i+1, intval(substr($tabelV, $i, 1))];
				array_push($subNormeringenV, $normV);
				
				$normM = [$i+1, intval(substr($tabelM, $i, 1))];
				array_push($subNormeringenM, $normM);
			}
			
			array_push($normeringen, $subNormeringenV, $subNormeringenM);
			
			return $normeringen;
		}
		
		public function calculateNormering($normering, $result, $gender)
		{
			if ($gender == "v")
			{
				$normering = $normering[1];
			}
			else
			{
				$normering = $normering[2];
			}
			
			
			for ($i = 0; $i < 24; $i++)
			{
				if ($result[0] == $normering[$i][0])
				{
					$newResult = [$result[1], $normering[$i][1]];
				}
			}
			
			return $newResult;
		}
		
	}
		
		
	
	
?>