<?php
// main page model class , with extended db connect function from BASE controllers
class Application_Models_MainPage extends Base_DbConnect {	 
	// get info from db to objects for main page representation
	public function getList() {  
		$conn = $this->dbConnect();
		$sql = "SELECT * FROM product_list";
		$result = $conn->query($sql);
		$i=0; 
		while($row = $result->fetch_object()) {		
			$patch = 'Application_Models_' . $row->type ; // patch to model + it's class name
			$new_product[$i] = new $patch;
			$new_product[$i]->set('id' , $row->id);
			$new_product[$i]->set('name' , $row->name);
			$new_product[$i]->set('price' , $row->price);
			$new_product[$i]->set('type' , $row->type);
			$new_product[$i]->set('size' , $row->size);
			$new_product[$i]->set('sku' , $row->sku);
			$i++;
		}
		// return $сatalogItems[] as objects with all products ; 
		return $new_product; 
	}
	// if delete btn was pressed and checboxes checked , delete this checkboxes
	public function delete() {
		$checkboxes = $_POST['checkboxes']; //all checkboxes as array value = id in db
		$conn = $this->dbConnect();
		for ($i=0; $i < sizeof($checkboxes); $i++) { 
			$sql = "DELETE FROM product_list WHERE id='$checkboxes[$i]'";
			$conn->query($sql); 
		}
  }
}
?>  