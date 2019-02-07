/**
 * 
 */
$(document).ready(function() {

}); // end $(document).ready


function movieClassSelect_on_change(e){
	var controlObj = e.target;
	var movieClassSelect = $('.movieClassSelectControl');
	if (movieClassSelect.length > 0){
		var movieCode = $(movieClassSelect).val();
		$('.movieClassInputControl').val(movieCode);
	}
}