<div  id="add-page-header-wrapper">
	<h5 id="add-page-header"> NEW  PRODUCT </h5> 
	<button id="large-screen-save-btn" class="btn btn-sm" type="submit" form="add_new_product_form" name="SubmitButton">
		save
	</button>
</div>
<!-- Err or Secces msg -->
<div id="add-err-or-success-container">
	<?php 
	if ($errors_succes_msg) {
		foreach ($errors_succes_msg as $value) {
			echo $value;
		}
	}
	?>
</div>
<!-- if errors exist add errorsbg class to fields , as well save fields value after "save" btn try by using session[return-post-for-fields]-->
<form  id="add_new_product_form" action="" method="POST">
	<label >NAME</label>
	<input id="new-product-name" name="name" class="form-control <?php echo isset($errors_succes_msg['name']) ? 'errorbg' : '' ?>" type="text" placeholder="New product name" value="<?php echo $_SESSION['return-post-for-fields']['name'] ?>">
	<label>PRICE $</label>
	<input id="new-product-price" name="price" class="form-control <?php echo isset($errors_succes_msg['price']) ? 'errorbg' : '' ?>" type="number" placeholder="New product price" value="<?php echo $_SESSION['return-post-for-fields']['price'] ?>">
	<label>TYPE SWITCHER</label>
	<select id="product-type"  name="type" class="form-control <?php echo isset($errors_succes_msg['type']) ? 'errorbg' : '' ?>" onchange="select(this.value)" value="<?php echo $_SESSION['return-post-for-fields']['type'] ?>">
		<option value="ProductTypes" selected >Select Product Type</option>
		<option value="DvdProduct" >DVD</option>
		<option value="BookProduct">Books</option>
		<option value="FurnitureProduct" >Furniture</option>
	</select>
	<div class="size-section-wrapper" id="DvdProduct">
		<label class="size-section-header">* PLEASE PROVIDE SIZE OF DVD IN MB. </label>
		<input id="new-dvd-size"  name="dvd_size" class="form-control <?php echo isset($errors_succes_msg['size']) ? 'errorbg' : '' ?>" type="number" placeholder="Size in mb"  value="<?php echo $_SESSION['return-post-for-fields']['dvd_size'] ?>">
	</div>
	<div class="size-section-wrapper"  id="FurnitureProduct">
		<label class="size-section-header" >* PLEASE PROVIDE DIMENSIONS IN H x W x L FORMAT IN CM</label>
		<label class="dimensions">HEIGHT</label>
		<input class="<?php echo isset($errors_succes_msg['size']) ? 'errorbg' : '' ?>" id="height" name="f_height" type="number" placeholder="Height" value="<?php echo $_SESSION['return-post-for-fields']['f_height']  ?>">
		<label class="dimensions">WIDHT</label>
		<input class="<?php echo isset($errors_succes_msg['size'])  ? 'errorbg' : '' ?>" id="width" name="f_width" type="number" placeholder="Width" value="<?php echo $_SESSION['return-post-for-fields']['f_width'] ?>">
		<label class="dimensions" >LENGHT</label>
		<input class="<?php echo isset($errors_succes_msg['size'])  ? 'errorbg' : '' ?>" id="lenght" name="f_lenght" type="number" placeholder="Lenght" value="<?php echo $_SESSION['return-post-for-fields']['f_lenght'] ?>">
	</div>
	<div  class="size-section-wrapper"  id="BookProduct">
		<label class="size-section-header">* PLEASE PROVIDE BOOK WEIGHT IN KG.</label>
		<input id="new-book-weight" name="book_weight" class="form-control <?php echo isset($errors_succes_msg['size'])  ? 'errorbg' : '' ?>
		" type="number" placeholder="Weight Kg"  value="<?php echo $_SESSION['return-post-for-fields']['book_weight'] ?>">
	</div>
	<button id="small-screen-save-btn" class="btn btn-sm" type="submit"  name="SubmitButton">
		save
	</button>
</form>