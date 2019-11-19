<?php
class Application_Models_DvdProduct extends Application_Models_ProductTypes
{
	public $size_type =  ' MB';
	public	function setSize() {
		if (is_numeric($_SESSION['postdata']['dvd_size'])) {
			$this->set('size' , $_SESSION['postdata']['dvd_size']);
		}	else {
			$this->set('size' , ''); // for err handler
		}
	}
}
?>