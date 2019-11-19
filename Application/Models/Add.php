<?php
// get post data from session -> check errors , if no err insert into db, return success or err msg.
 class Application_Models_Add extends Base_DbConnect  {	  
	public function addToDb() {
		$patch = 'Application_Models_' . $_SESSION['postdata']['type'] ; // patch to model + model name
		$new_product = new  $patch;  // if not selected , then $_SESSION['postdata']['type'] == Product , to give full errors stuck not only type err
		$new_product->setSize();
		$new_product->set('id' , $_SESSION['postdata']['id']);
		$new_product->set('name' , $_SESSION['postdata']['name']);
		$new_product->set('price' ,$_SESSION['postdata']['price']);
		$new_product->set('type' , $_SESSION['postdata']['type']);
		$errors = $new_product->validation();	
		if (empty($errors)) { 
			$conn = $this->dbConnect();
			$query = $conn->prepare("INSERT INTO product_list (name,price,size,type) VALUES (?,?,?,?)");
			$query->bind_param('siss' , $new_product->name, $new_product->price, $new_product->size,$new_product->type);
			$query->execute();
			$last_id = $conn->insert_id;
			$sku = $this->skuGenerator($last_id ,  $new_product->type);
			$sql = "UPDATE product_list SET sku = '$sku' WHERE id = '$last_id' ";
			$conn->query($sql); 
			unset($_SESSION['return-post-for-fields']); // if succes - delete data from fields 
			$success[] = '<p class="success" >Success</p>';
			return $success;
		}	else {
			$_SESSION['return-post-for-fields'] = $_SESSION['postdata']; //if error create new session with post data copy to use it in fields, as $_SESSION['postdata'] will be unset
			return $errors;
		}		 
	}
 	private function skuGenerator($id , $product_type ){
		//FOR EASY FINDING, WHICH SECTION IS IN USE
		$section_abrr = strtoupper(substr($product_type,0,1)); 
		// FOR FUTURE USE , IF WILL NEED MORE INFO IN CODE
		$zero_generator = substr('00000000', 0, - strlen((string)$id)); 
		$sku_id = $zero_generator . $id;
		$sku =  $section_abrr . $sku_id;
		return $sku;
  	}
}
?>