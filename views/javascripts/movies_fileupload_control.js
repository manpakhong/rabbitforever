/**
 * 
 */
var fileUploadedRootFolder = '../images/uploads/movies';
$(document).ready(function() {  
	 initEventHandlers();
}); 
function clearUploadedIndicator(){
	var spans = $('.fileuploaddiv').find('span');
	$(spans).each(function() {
		  $( this ).remove();
		});
}
function initEventHandlers(){
//	$('.submitinput').click(function(event){
//		event.preventDefault();
//		postFile();
//	});
	initAjaxForm();
}
function initAjaxForm(){
	var barDiv = $('.bardiv');
	var percentDiv = $('.percentdiv');
	var statusDiv = $('.statusdiv');
	$('.fileuploadform').ajaxForm({
	    beforeSend: function() {
	        statusDiv.empty();
	        var percentVal = '0%';
	        barDiv.width(percentVal);
	        percentDiv.html(percentVal);
	    },
	    uploadProgress: function(event, position, total, percentComplete) {
	        var percentVal = percentComplete + '%';
	        barDiv.width(percentVal);
	        percentDiv.html(percentVal);
	    },
	    success: function(data, statusText, xhr) {
	        var percentVal = '100%';
	        barDiv.width(percentVal);
	        percentDiv.html(percentVal);
	        statusDiv.html(xhr.responseText);
	        addIfSuccessfulUploadedName(data);
	    },
	    error: function(xhr, statusText, err) {
	        statusDiv.html(err || statusText);
	    }
	}); 

}

function addIfSuccessfulUploadedName(data){
	var regExp = /(uploaded:)\s(.*)\s(\([0-9a-zA-Z\s]{1,}\))/;
	var match = regExp.exec(data);
	if (!isUndefinedOrIsNull(match)){
		var spans = $('.fileuploaddiv').find('span');
		var html = '';
		if (spans.length > 0){
			html += '<br/>';
		}
		html += '<span>' + fileUploadedRootFolder + '/' + match[2] + '</span>';
		$('.fileuploaddiv').append(html);		
	}

}
