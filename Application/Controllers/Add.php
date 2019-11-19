<?php
$prg = new Application_Controllers_Prg;
$prg->postRedirectGet(); // PRG to avoid form post resend ,on page refresh and back button .
//ADD page controller
class Application_Controllers_Add  extends Base_Controller {	  
	public function index() { 
		if($_SESSION['post']  == 'POST') { 
			$model=new Application_Models_Add;
			$errors_succes_msg = $model->addToDb();
			$this->errors_succes_msg=$errors_succes_msg; 
			unset($_SESSION['postdata']);
			unset($_SESSION['post']);
		}
	}	
}
?>