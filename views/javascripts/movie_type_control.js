/**
 * 
 */
$(document).ready(function() {

}); // end $(document).ready

function movieTypeSelect_onchange(e){
	var controlObj = e.target;
	var movieTypeSelect = $('.movieTypeSelectControl');
	if (movieTypeSelect.length > 0){
		var movieTypeId = $(movieTypeSelect).val();
		$('.movieTypeInputControl').val(movieTypeId);
	}
}