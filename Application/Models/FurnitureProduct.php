<?php
class Application_Models_FurnitureProduct extends Application_Models_ProductTypes {
	public $size_type =  ' Cm';
	public function setSize() {
		if (is_numeric($_SESSION['postdata']['f_height']) || is_numeric($_SESSION['postdata']['f_width']) || is_numeric($_SESSION['postdata']['f_lenght'])) {
			$this->set('size' , $_SESSION['postdata']['f_height'] .' x '.$_SESSION['postdata']['f_width'].' x '.$_SESSION['postdata']['f_lenght']);
		}	else {
			$this->set('size' , ''); // for err handler
		}
	}
}
?>