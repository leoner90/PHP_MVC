<?php 
//main page control
class Application_Controllers_MainPage  extends Base_Controller {
	public function index() { // index function loads when page is requested
		$model= new Application_Models_MainPage;
		// call model function delete() to delete checked fields from db
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkboxes'])) {
			$model->delete();
		}
		// Get fields from db send back as object
		$get_сatalogItems = $model->getList();	
		$this->сatalogItems=$get_сatalogItems;
	}
} 
?> 