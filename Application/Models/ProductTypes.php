<?php
// class for objects with information from db
class Application_Models_ProductTypes  {
	public $id;
	public $name;
	public $price;
	public $type;
	public $size;
	public function set($name , $value){
		return $this->$name = $value;
	}
	public function get($name ){
		return $this->$name;
	}
	public function setSize() {
		$this->set('size' , ''); // becouse partition not selected
	}
	public function validation(){
		if ($this->get('name') == '' || strlen($this->get('name')) > 30  ) {
			$errors['name'] = '<p class="errors"> Name - can\'t be empty or exceed 30 symbols</p>';
		}
		if ($this->get('size')  == '' || strlen($this->get('size')) > 15) {
		  $errors['size'] = ' <p class="errors"> Sizes  can\'t be empty or exceed 15 symbols , provide only numbers</p>';
		}
		
		if (!is_numeric($this->get('price'))  || strlen($this->get('price')) > 15) {
		  $errors['price'] = '<p class="errors"> Price - can\'t be empty or exceed 15 symbols , provide only numbers</p>';
		}
		if ($this->get('size') == '' || strlen($this->get('size')) > 15) {
		  $errors['size'] = '<p class="errors"> Size - can\'t be empty or exceed 15 symbols , provide only numbers</p>';
		}
		if ($this->get('type') == '' || $this->get('type') == 'ProductTypes' ) {
		  $errors['type'] = '<p class="errors"> Select Type</p>';
		}
		return $errors;
	}
}
?>