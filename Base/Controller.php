<?php
//Base Function For Controller Extensions
class Base_Controller {
	private $member; 
	public function __set($name,$val) {
		$this->member[$name] = $val;
	}
	public function __get($name) {
		return $this->member;	
	}     
}

?>