<div id="main-page-header-wrapper">
	<h5 id="main-page-header" >PRODUCT LIST </h5>
	<select id="main-page-select" class="form-control" onchange="changeSection()">
		<option value="all" selected >ALL</option>
		<option value="DvdProduct">DVD-discs</option>
		<option value="BookProduct">Books</option>
		<option value="FurnitureProduct">Furniture</option>
	</select>  
</div>
<form id="main-page-body-wrapper" action="" method="POST">
	<?
	// сatalogItems[] - object for each product
	if ($сatalogItems) {
		for ($i=0; $i < sizeof($сatalogItems) ; $i++) {
			if($i % 3 == 0 && $i != 0) echo '<div class="clear-both"></div>';
			echo '
			<div class="'. $сatalogItems[$i]->type  .' product-section-box" >
			<input class="checkboxes" type="checkbox" value="'.  $сatalogItems[$i]->get('id')  .'" name="checkboxes[]" selectedType="'.$сatalogItems[$i]->get('type').'">
			<p class="product-section-box-row" >
			<span class="product-section-box-row-name" >SKU:</span>
			'. $сatalogItems[$i]->get('sku').'
			</p>
			<p class="product-section-box-row" >
			<span class="product-section-box-row-name" >NAME:</span>
			'. $сatalogItems[$i]->get('name').'
			</p>
			<p class="product-section-box-row" >
			<span class="product-section-box-row-name" >PRICE:</span>
			'. $сatalogItems[$i]->get('price').' $
			</p>
			<p class="product-section-box-row" >
			<span class="product-section-box-row-name" >SIZE:</span>
			'. $сatalogItems[$i]->get('size').$сatalogItems[$i]->get('size_type').'
			</p>
			</div>';
		}
	}
	?>
</form>
<div id="select-all-section">
	<label>
		<input id="select-all-checkbox" type="checkbox" onchange="selectAll()" /> 
		SELECT ALL
	</label>
	<button id="delete-btn" class="btn  btn-danger" form="main-page-body-wrapper">
		DELETE
	</button>
</div>