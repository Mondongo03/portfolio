<?php

require_once "../vendor/autoload.php";
require_once "../src/ProjectController.php";
require_once "../src/TechnologyController.php";
require_once "../src/ProjectTechnologyController.php";

$projectController = new ProjectController();
$technologyController = new TechnologyController();
$project_technologyController = new ProjectTechnologyController();
// prepare twig
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
	//'cache' => 'cache',
]);
  
// $pc = new ProjectController();
// print_r("<pre>");
// print_r($pc->getProjects());
// print_r("</pre>");

// Este array lo tiene que devolver el controlador
echo $twig->render('index.html', [
	'name' => 'Rubén Julián',
	'work' => 'Desarrollador de aplicaciones multiplataforma & web',
	'projects' => $projectController->getProjects(),
	'technologys' => $technologyController->getTechnology(),
	'projectsTechnologys' => $project_technologyController->getProjectTechnology()
	
]);
 


?>
