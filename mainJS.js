// Get add page select value(from post) -> select product type partition after page reload
$(document).ready(function() {
	var add_page_select = $("#product-type").attr("value");
	if (add_page_select) {
		$("#product-type").val(add_page_select);
		$('#' + add_page_select).slideDown(250); 
	}
})
// Add page size partition select
function select(id) {
	$('#height ,#width, #lenght, #new-book-weight, #new-dvd-size').val('');
	$('#DvdProduct , #FurnitureProduct , #BookProduct').hide(0);
	$('#' + id).slideDown(250); 
}
// MAIN PAGE - if "select all" checkbox is checked - check all boxes in relevant partition or all
function selectAll() {
	$('.checkboxes').prop( "checked", false ); //in case if some boxes was cheked manualy
	if($('#select-all-checkbox').is(':checked')) {
		var type = $("#main-page-select").val();
		if (type == 'all') {
		$('.checkboxes').prop( "checked", true );
		} else {
			$( ".checkboxes" ).each(function(){
				if ($(this).attr('selectedType') == type ) {
					$(this).prop("checked", ! $(this).prop("checked"));
				}
			})
		}
	}	else { // otherwise uncheck all boxes
		$('.checkboxes').prop( "checked", false );
	}
}
// MAIN PAGE - show partition depending on select value
function changeSection() {
	$(".BookProduct , .DvdProduct , .FurnitureProduct").hide();
	var main_page_select = $("#main-page-select").val();
	if(main_page_select == 'all'){
		$(".BookProduct , .DvdProduct ,.FurnitureProduct").show();
	}
	$("."+main_page_select).show(0);
	//otherwise would left selected all checkbox -  checked , when   should be only previous partition boxes
	$('#select-all-checkbox').prop( "checked", false );
	$('.checkboxes').prop( "checked", false );
}
// DELETE ERROR CLASS FROM INPUT ON FOCUS
$( ".errorbg" ).focus(function() {
	$( this ).removeClass('errorbg');
});