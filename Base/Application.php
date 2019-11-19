<?php
class Base_Application {
	// get route from link , or set it us main page in case of first enter
	private function getRoute() {
		if (empty($_GET['route'])){
			$route = 'MainPage';
		}	else {
			$route = $_GET['route']; 
		}
		return $route;
	}
	//return path to controler
	private function getController(){       
		$route=$this->getRoute();
		$controller='Application/Controllers/'. $route . '.php';
		if (!file_exists($controller)) {
			$controller = 'Application/Controllers/404.php';;
		}
		return $controller;
	}
	// //return path to view
	public function getView() {
	$route=$this->getRoute();
		$view = 'Application/views/'. $route . '.php';
		if (!file_exists($view)) {
			$view = 'Application/views/404.php';
		}
		return $view;
	}
	//Find controller for current page
	public function run() {
		session_start(); 
		$controller=$this->getController(); //get name of contoller
		$cl=explode('.', $controller); //explode to controler path and file expansion
		$cl=$cl[0]; //delete file expansion leave only clear path
		$name_contr=str_replace("/", "_", $cl);// replace path of controller -  to controler name
		$contr=new $name_contr; //create an instance of the controller class
		$contr->index(); //all controlers must have index function -> start it
		$member=$contr->member; //get controler variables
		return $member; //return variables to index.php
	}
}
?>