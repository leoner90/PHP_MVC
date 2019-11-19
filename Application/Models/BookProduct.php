<?php
class Application_Models_BookProduct extends Application_Models_ProductTypes {
	public $size_type =  ' KG';
	public function setSize() {
		if (is_numeric($_SESSION['postdata']['book_weight'])) {
		 	$this->set('size' , $_SESSION['postdata']['book_weight']);
		}	else {
			$this->set('size' , ''); // for err handler
		}
	}
}
?>