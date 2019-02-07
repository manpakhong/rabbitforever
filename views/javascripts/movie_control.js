// JavaScript Document
var MOVIE_STATUS_PENDING = 'MOVIE_STATUS_PENDING';
var MOVIE_STATUS_IN_PROGRESS = 'MOVIE_STATUS_IN_PROGRESS';
var MOVIE_STATUS_ARRIVED = 'MOVIE_STATUS_ARRIVED';
var MOVIE_STATUS_READY_FOR_DOWNLOAD = 'MOVIE_STATUS_READY_FOR_DOWNLOAD';
var MOVIE_STATUS_DOWNLOADED = 'MOVIE_STATUS_DOWNLOADED';

$(document).ready(function(){ 
	//alert('helo');
	checkFormDataChangeByInterval();

}); // end $(document).ready

function lookupButton_onclick(e){
	var controlObj = e.target;
	movieLookupDialog.dialog("open");
	retrieveMovieControlDataAndBindMovieLookupControl();
}
function retrieveMovieControlDataAndBindMovieLookupControl(){
	var movieVo = collectMovieVoFromMovieControl();
	bindMovieLookupControl(movieVo);
}
function postSaveMovieVo(movieVo) {
	// var data = JSON.stringify(_userObj, null, 2);
	var vo = createVo();
	if (movieVo.id == -1) {
		vo.command = CMD_TYPE_INSERT;
	} else {
		vo.command = CMD_TYPE_UPDATE;
	}
	vo.dataClassName = 'MovieVo';
	vo.dataInstance = movieVo;
	var dataString = JSON.stringify(vo);
	dataString = '{' + '"vo": ' + dataString + '}';
	console.log(dataString);
	// dataString = '{' +'"cmdObjectDto": ' + dataString + '}';

	
	$.ajax({
		type : "POST",
		url : "../../../rabbitforever/commands/MoviePageCommand.php",
		data : {
			data : dataString
		}
	}).done(function(data, status, jqXHR) {
		saveMovieVoCallBack(data);
//		alert("Promise success callback.");
	}).fail(function(jqXHR, status, err) {
//		alert("Promise error callback.");
	}).always(function() {
//		alert("Promise completion callback.");
	})
}
function clearMovieDetailsDialog(){
	var movieIdFormInput = $('.movieIdForm');
	var movieNameEnInput = $('.movieNameEnForm');
	var movieNameTcInput = $('.movieNameTcForm');
	var moviePic1Input = $('.moviePic1Form');
	var moviePic2Input = $('.moviePic2Form');
	var remarksInput = $('.remarksForm');
	var movieClassInput = $('.movieClassForm');
	var movieTypeInput = $('.movieTypeForm');
	var createdByInput = $('.createdByForm');
	var updatedByInput = $('.updatedByForm');
	var createdDateInput = $('.createdDateForm');
	var updatedDateInput = $('.updatedDateForm');
	
	
	if (movieIdFormInput.length > 0){
		$(movieIdFormInput).attr('value','');
		$(movieIdFormInput).val('');
	}
	if (movieNameEnInput.length > 0){
		$(movieNameEnInput).attr('value','');	
		$(movieNameEnInput).val('');
	}
	if (movieNameTcInput.length > 0){
		$(movieNameTcInput).attr('value','');
		$(movieNameTcInput).val('');
	}
	if (moviePic1Input.length > 0){
		$(moviePic1Input).attr('value','');
		$(moviePic1Input).val('');
	}
	if (moviePic2Input.length > 0){
		$(moviePic2Input).attr('value','');
		$(moviePic2Input).val('');
	}
	if (remarksInput.length > 0){
		$(remarksInput).attr('value','');
		$(remarksInput).val('');
	}
	if (movieClassInput.length > 0){
		$(movieClassInput).attr('value','');
		$(movieClassInput).val('');
	}
	if (movieTypeInput.length > 0){
		$(movieTypeInput).attr('value','');
		$(movieTypeInput).val('');
	}
	if (createdByInput.length > 0){
		$(createdByInput).attr('value','');
		$(createdByInput).val('');
	}
	if (updatedByInput.length > 0){
		$(updatedByInput).attr('value','');
		$(updatedByInput).val('');
	}
	if (createdDateInput.length > 0){
		$(createdDateInput).attr('value','');
		$(createdDateInput).val('');
	}
	if (updatedDateInput.length > 0){
		$(updatedDateInput).attr('value','');
		$(updatedDateInput).val('');
	}
	
}

function saveMovieVoCallBack(jsonStr) {
	var moviePageVo = JSON.parse(jsonStr);
	var movieVo = moviePageVo.movieVo;
	
	var movieVoArray = moviePageVo.movieVoArray;
	if (isUndefinedOrIsNull(moviePageVo)) {
		console.log('Abnormal nullable data return');
		return;
	}
	var isSaved = moviePageVo.isSaved;
	var message = null;
	if (isSaved){
		if (lang == LANG_EN){
			message = $('.saveSuccessfullyEn').val();
		} else {
			message = $('.saveSuccessfullyTc').val();
		}
		alert(message);
		if (!isUndefinedOrIsNull(movieVo.id)){
			var movieIdFormInput = $('.movieIdForm');
			$(movieIdFormInput).val(movieVo.id);
		}
		if (typeof closeMovieModal === 'function'){
			if (typeof bindTrValueToMovieWaitingRow === 'function'){
				bindTrValueToMovieWaitingRow();
			}
			closeMovieModal();
			
		} else {
			alert('no closeMovieModal function!');
		}
	} else {
		if (lang == LANG_EN){
			message = $('.saveFailureEn').val();
		} else {
			message = $('.saveFailureTc').val();
		}
		alert(message);
	}
}

function collectMovieVoFromMovieControl(){
	var movieVo = createMovieVo();
	var movieIdFormInput = $('.movieIdForm');
	var movieNameEnInput = $('.movieNameEnForm');
	var movieNameTcInput = $('.movieNameTcForm');
	var moviePic1Input = $('.moviePic1Form');
	var moviePic2Input = $('.moviePic2Form');
	var remarksInput = $('.remarksForm');
	var movieClassInput = $('.movieClassForm');
	var movieTypeInput = $('.movieTypeForm');
	var createdByInput = $('.createdByForm');
	var updatedByInput = $('.updatedByForm');
	var createdDateInput = $('.createdDateForm');
	var updatedDateInput = $('.updatedDateForm');
	
	if (movieIdFormInput.length > 0){
		var idString = $(movieIdFormInput).val();
		if (!isUndefinedOrIsNull(idString)){
			movieVo.id = tryParseInt(idString);			
		}
	}
	if (movieNameEnInput.length > 0){
		movieVo.movieNameEn = $(movieNameEnInput).val();	
	}
	if (movieNameTcInput.length > 0){
		movieVo.movieNameTc = $(movieNameTcInput).val();		
	}
	if (moviePic1Input.length > 0){
		movieVo.moviePic1 = $(moviePic1Input).val();
	}
	if (moviePic2Input.length > 0){
		movieVo.moviePic2 = $(moviePic2Input).val();
	}
	if (remarksInput.length > 0){
		movieVo.remarks = $(remarksInput).val();
	}
	if (movieClassInput.length > 0){
		movieVo.classCode = $(movieClassInput).val();
	}
	if (movieTypeInput.length > 0){
		var movieTypeIdString = $(movieTypeInput).val();
		movieVo.movieTypeId = tryParseInt(movieTypeIdString);
	}
	var userName = getUserName();
	
	if (createdByInput.length > 0){
		movieVo.createdBy = $(createdByInput).val();
	}
	
	if (isUndefinedOrIsNull(movieVo.createdBy) || movieVo.createdBy == ''){
		if (!isUndefinedOrIsNull(userName)) {
			movieVo.createdBy = userName;
		}
	}

	if (updatedByInput.length > 0){
		if (!isUndefinedOrIsNull(updatedByInput) && $(updatedByInput).val() != ''){
			movieVo.updatedBy = $(updatedByInput).val();			
		} else {
			if (!isUndefinedOrIsNull(userName)) {
				movieVo.updatedBy = userName;
			}
		}

	}
	if (createdDateInput.length > 0){
		var createdDateString = $(createdDateInput).val();
		movieVo.createdDate = createdDateString;
	}
	if (updatedDateInput.length > 0){
		var updatedDateString = $(updatedDateInput).val();
		movieVo.updatedDate = updatedDateString;
	}
	return movieVo;
}

var movieTcNameFormInputVal = '';
var movieEnNameFormInputVal = '';
var movieTcNameFormInputValTemp = '';
var movieEnNameFormInputValTemp = '';
var anyFormValueChange = false;
var CHECK_DATA_INTERVAL_FORM = 3000; 
function checkFormDataChangeByInterval(){
	setInterval(function(){
		movieTcNameFormInputValTemp = $('.movieNameTcForm').val();
		movieEnNameFormInputValTemp = $('.movieNameEnForm').val();
		
		if (!isUndefinedOrIsNull(movieTcNameFormInputValTemp)){
			if (movieTcNameFormInputValTemp != movieTcNameFormInputVal){
				anyFormValueChange = true;
				movieTcNameFormInputVal = movieTcNameFormInputValTemp;
			}
		}
		
		if (!isUndefinedOrIsNull(movieEnNameFormInputValTemp)){
			if (movieEnNameFormInputValTemp != movieEnNameFormInputVal){
				anyFormValueChange = true;
				movieEnNameFormInputVal =  movieEnNameFormInputValTemp;
			}
		}
		if (anyFormValueChange){
			doFormLookup();
		}
	}, CHECK_DATA_INTERVAL_FORM);
}

function doFormLookup(){
	var movieVo = createMovieVo();
	
	movieVo.movieNameTc = movieTcNameFormInputVal;
	movieVo.movieNameEn = movieEnNameFormInputVal;

	
	anyFormValueChange = false;
	postLookupMovieForm(movieVo);
}
function postLookupMovieForm(movieVo){
	var vo = createVo();
	vo.command = CMD_TYPE_SELECT;
	vo.dataClassName = 'MovieVo';
	vo.dataInstance = movieVo;
	var dataString = JSON.stringify(vo);
	dataString = '{' + '"vo": ' + dataString + '}';
	console.log(dataString);
	// dataString = '{' +'"cmdObjectDto": ' + dataString + '}';

	
	$.ajax({
		type : "POST",
		url : "../../../rabbitforever/commands/MoviePageCommand.php",
		data : {
			data : dataString
		}
	}).done(function(data, status, jqXHR) {
		lookupMovieFormCallBack(data);
//		alert("Promise success callback.");
	}).fail(function(jqXHR, status, err) {
//		alert("Promise error callback.");
	}).always(function() {
//		alert("Promise completion callback.");
	})
}
function lookupMovieFormCallBack(jsonStr) {
	var moviePageVo = JSON.parse(jsonStr);
	var movieVo = moviePageVo.movieVo;
	var movieVoArray = moviePageVo.movieVoArray;
	var lookupIconButtonSpan = $('.lookupIconButtonSpan');
	if (isUndefinedOrIsNull(moviePageVo)) {
		console.log('Abnormal nullable data return');
		return;
	}
	var lookupIconButtonHtml = '';
	if (movieVoArray.length > 0) {

		$.each( movieVoArray, function( key, value ) {
			  var vo = value;

		});
		lookupIconButtonHtml = '';
		if (lookupIconButtonSpan.length > 0){
			$(lookupIconButtonSpan).empty();
			lookupIconButtonHtml = '<input type="button" class="smallbutton lookupbutton_with_record lookupIconButton" onclick="lookupButton_onclick(event)"  />';
			$(lookupIconButtonSpan).append(lookupIconButtonHtml);			
		}
	} else {
		lookupIconButtonHtml = '';
		if (lookupIconButtonSpan.length > 0){
			$(lookupIconButtonSpan).empty();
			lookupIconButtonHtml = '<input type="button" class="smallbutton lookupbutton lookupIconButton" onclick="lookupButton_onclick(event)"  />';
			$(lookupIconButtonSpan).append(lookupIconButtonHtml);			
		}
	}
}
function movieLookupSelectCallBack(movieVo){
	if (!isUndefinedOrIsNull(movieVo)){
		var movieIdForm = $('.movieIdForm');
		var movieNameEnForm = $('.movieNameEnForm');
		var movieNameTcForm = $('.movieNameTcForm');
		var movieTypeSelectForm = $('.movieTypeSelectForm');
		var movieTypeForm = $('.movieTypeForm');
		var movieClassSelectForm = $('.movieClassSelectForm');
		var movieClassForm = $('.movieClassForm');
		var remarksForm = $('.remarksForm');
		var moviePic1Form = $('.moviePic1Form');
		var moviePic1Img = $('.moviePic1Img');
		var moviePic2Form = $('.moviePic2Form');
		var moviePic2Img = $('.moviePic2Img');
		var createdByForm = $('.createdByForm');
		var updatedByForm = $('.updatedByForm');
		var createdDateForm = $('.createdDateForm');
		var updatedDateForm = $('.updatedDateForm');
		
		
		if (movieClassForm.length > 0){
			if (!isUndefinedOrIsNull(movieVo.classCode) && movieVo.classCode != ''){
				$(movieClassForm).attr('value', movieVo.classCode);
				$(movieClassForm).val(movieVo.classCode);
				movieVo.classCodeString = movieVo.classCodeString;
				$(movieClassSelectForm).val(movieVo.classCode)
			}
		}
		
		if (movieNameEnForm.length > 0){
			if (!isUndefinedOrIsNull(movieVo.movieNameEn)){
				$(movieNameEnForm).attr('value', movieVo.movieNameEn);
				$(movieNameEnForm).val(movieVo.movieNameEn);
			}
		}

		if (createdByForm.length > 0){
			if (!isUndefinedOrIsNull(movieVo.createdBy)){
				$(createdByForm).attr('value', movieVo.createdBy);
				$(createdByForm).val(movieVo.createdBy);
			}
		}

		if (movieIdForm.length > 0){
			if (!isUndefinedOrIsNull(movieVo.id)){
				$(movieIdForm).attr('value', movieVo.id);
				$(movieIdForm).val(movieVo.id);
			}
		}

		if (createdDateForm.length > 0){
			if (!isUndefinedOrIsNull(movieVo.createdDate)){
				$(createdDateForm).attr('value', movieVo.createdDateString);
				$(createdDateForm).val(movieVo.createdDateString);
				movieVo.createdDate;
			}
		}
		if (movieNameEnForm.length > 0){
			if (!isUndefinedOrIsNull(movieVo.movieNameEn)){
				$(movieNameEnForm).attr('value', movieVo.movieNameEn);
				$(movieNameEnForm).val(movieVo.movieNameEn);
			}
		}
		if (movieNameTcForm.length > 0){
			if (!isUndefinedOrIsNull(movieVo.movieNameTc)){
				$(movieNameTcForm).attr('value', movieVo.movieNameTc);
				$(movieNameTcForm).val(movieVo.movieNameTc);
			}
		}

		if (moviePic1Form.length > 0){
			if (!isUndefinedOrIsNull(movieVo.moviePic1)){
				$(moviePic1Form).attr('value', movieVo.moviePic1);
				$(moviePic1Form).val(movieVo.moviePic1);
				refreshMoviePic1();
			}
		}
		if (moviePic2Form.length > 0){
			if (!isUndefinedOrIsNull(movieVo.moviePic2)){
				$(moviePic2Form).attr('value', movieVo.moviePic2);
				$(moviePic2Form).val(movieVo.moviePic2);
				refreshMoviePic2();
			}
		}
		movieVo.movieTrailor;
		if (movieTypeForm.length > 0){
			if (!isUndefinedOrIsNull(movieVo.movieTypeId) && movieVo.movieTypeId != ''){
				$(movieTypeForm).attr('value', movieVo.movieTypeId);
				$(movieTypeForm).val(movieVo.movieTypeId);
				movieVo.movieTypeString;
				$(movieTypeSelectForm).val(movieVo.movieTypeId);
			}
		}
		if (remarksForm.length > 0){
			if (!isUndefinedOrIsNull(movieVo.remarks)){
				$(remarksForm).attr('value', movieVo.remarks);
				$(remarksForm).val( movieVo.remarks);
			}
		}
		if (updatedByForm.length > 0){
			if (!isUndefinedOrIsNull(movieVo.updatedBy)){
				$(updatedByForm).attr('value', movieVo.updatedBy);
				$(updatedByForm).val(movieVo.updatedBy);
			}
		}
		if (updatedDateForm.length > 0){
			if (!isUndefinedOrIsNull(movieVo.updatedDate)){
				$(updatedDateForm).attr('value', movieVo.updatedDateString);
				$(updatedDateForm).val(movieVo.updatedDateString);
			}
		}
	}
}
function removeMovieDetailsDivRedBorder(){
	var movieDetailsDiv = $('.movieDetailsDiv');
	var allInputs = $(movieDetailsDiv).find('input');
	var selectInputs = $(movieDetailsDiv).find('select');
	$(allInputs).each(function(i){
		$(this).removeClass('boderred');
	})
	
	$(selectInputs).each(function(i){
		$(this).removeClass('boderred');
	})

}

function validateSelectMovieVoInputFields(){
	var isValid = true;
	
	removeMovieDetailsDivRedBorder();
	
	
	var movieVo = collectMovieVoFromMovieControl();
	
	var movieIdForm = $('.movieIdForm');	
	var movieNameEnForm = $('.movieNameEnForm');
	var movieNameTcForm = $('.movieNameTcForm');
	var movieTypeSelectForm = $('.movieTypeSelectForm');
	var movieTypeForm = $('.movieTypeForm');
	var movieClassSelectForm = $('.movieClassSelectForm');
	var movieClassForm = $('.movieClassForm');
	
	
	var remarksForm = $('.remarksForm');
	var moviePic1Form = $('.moviePic1Form');
	var moviePic1Img = $('.moviePic1Img');
	var moviePic2Form = $('.moviePic2Form');
	var moviePic2Img = $('.moviePic2Img');
	var createdByForm = $('.createdByForm');
	var updatedByForm = $('.updatedByForm');
	var createdDateForm = $('.createdDateForm');
	var updatedDateForm = $('.updatedDateForm');
	
	var alertString = "";
	var count = 0;
	
	if (movieIdForm.length > 0){
		if (isUndefinedOrIsNull(movieVo.id) || movieVo.id == ''){
			if (count > 0){
				alertString += '\n';
			}
			alertString += getBundleLangByLabel('pleaseLookupMovieBeforePressSelectButton');
			isValid = false;
			count++;
		}
	}
	
//	if (movieClassForm.length > 0){
//		if (isUndefinedOrIsNull(movieVo.classCode) || movieVo.classCode == ''){
//			if (count > 0){
//				alertString += '\n';
//			}
//			alertString += getBundleLangByLabel('class') + " " + getBundleLangByLabel('isRequired');
//			$(movieClassSelectForm).addClass('boderred');
//			isValid = false;
//			count++;
//		}
//	}
//	
//	if (movieNameEnForm.length > 0){
//		if (isUndefinedOrIsNull(movieVo.movieNameEn) || movieVo.movieNameEn == ''){
//			if (count > 0){
//				alertString += '\n';
//			}
//			alertString += getBundleLangByLabel('movieEnName') + " " + getBundleLangByLabel('isRequired');
//			$(movieNameEnForm).addClass('boderred');
//			isValid = false;
//			count++;
//		}
//	}
//
//	if (movieNameTcForm.length > 0){
//		if (isUndefinedOrIsNull(movieVo.movieNameTc) || movieVo.movieNameTc == ''){
//			if (count > 0){
//				alertString += '\n';
//			}
//			alertString += getBundleLangByLabel('movieTcName') + " " + getBundleLangByLabel('isRequired');
//			$(movieNameTcForm).addClass('boderred');
//			isValid = false;
//			count++;
//		}
//	}
//
//	if (movieTypeForm.length > 0){
//		if (isUndefinedOrIsNull(movieVo.movieTypeId) || movieVo.movieTypeId == ''){
//			if (count > 0){
//				alertString += '\n';
//			}
//			alertString += getBundleLangByLabel('movieType') + " " + getBundleLangByLabel('isRequired');
//			$(movieTypeSelectForm).addClass('boderred');
//			isValid = false;
//			count++;
//		}
//	}
//	if (remarksForm.length > 0){
//		if (!isUndefinedOrIsNull(movieVo.remarks)){
//			count++;
//		}
//	}
//
//	if (moviePic1Form.length > 0){
//		if (!isUndefinedOrIsNull(movieVo.moviePic1)){
//			count++;
//		}
//	}
//	if (moviePic2Form.length > 0){
//		if (!isUndefinedOrIsNull(movieVo.moviePic2)){
//			count++;
//		}
//	}
	
	if (!isValid){
		alert(alertString);
	}
	return isValid;
}

function validateMovieVoInputFields(){
	var isValid = true;
	
	removeMovieDetailsDivRedBorder();
	
	
	var movieVo = collectMovieVoFromMovieControl();
	
	var movieIdForm = $('.movieIdForm');	
	var movieNameEnForm = $('.movieNameEnForm');
	var movieNameTcForm = $('.movieNameTcForm');
	var movieTypeSelectForm = $('.movieTypeSelectForm');
	var movieTypeForm = $('.movieTypeForm');
	var movieClassSelectForm = $('.movieClassSelectForm');
	var movieClassForm = $('.movieClassForm');
	
	
	var remarksForm = $('.remarksForm');
	var moviePic1Form = $('.moviePic1Form');
	var moviePic1Img = $('.moviePic1Img');
	var moviePic2Form = $('.moviePic2Form');
	var moviePic2Img = $('.moviePic2Img');
	var createdByForm = $('.createdByForm');
	var updatedByForm = $('.updatedByForm');
	var createdDateForm = $('.createdDateForm');
	var updatedDateForm = $('.updatedDateForm');
	
	var alertString = "";
	var count = 0;
	if (movieClassForm.length > 0){
		if (isUndefinedOrIsNull(movieVo.classCode) || movieVo.classCode == ''){
			if (count > 0){
				alertString += '\n';
			}
			alertString += getBundleLangByLabel('class') + " " + getBundleLangByLabel('isRequired');
			$(movieClassSelectForm).addClass('boderred');
			isValid = false;
			count++;
		}
	}
	
	if (movieNameEnForm.length > 0){
		if (isUndefinedOrIsNull(movieVo.movieNameEn) || movieVo.movieNameEn == ''){
			if (count > 0){
				alertString += '\n';
			}
			alertString += getBundleLangByLabel('movieEnName') + " " + getBundleLangByLabel('isRequired');
			$(movieNameEnForm).addClass('boderred');
			isValid = false;
			count++;
		}
	}

	if (movieNameTcForm.length > 0){
		if (isUndefinedOrIsNull(movieVo.movieNameTc) || movieVo.movieNameTc == ''){
			if (count > 0){
				alertString += '\n';
			}
			alertString += getBundleLangByLabel('movieTcName') + " " + getBundleLangByLabel('isRequired');
			$(movieNameTcForm).addClass('boderred');
			isValid = false;
			count++;
		}
	}

	if (movieTypeForm.length > 0){
		if (isUndefinedOrIsNull(movieVo.movieTypeId) || movieVo.movieTypeId == ''){
			if (count > 0){
				alertString += '\n';
			}
			alertString += getBundleLangByLabel('movieType') + " " + getBundleLangByLabel('isRequired');
			$(movieTypeSelectForm).addClass('boderred');
			isValid = false;
			count++;
		}
	}
	if (remarksForm.length > 0){
		if (!isUndefinedOrIsNull(movieVo.remarks)){
			count++;
		}
	}

	if (moviePic1Form.length > 0){
		if (!isUndefinedOrIsNull(movieVo.moviePic1)){
			count++;
		}
	}
	if (moviePic2Form.length > 0){
		if (!isUndefinedOrIsNull(movieVo.moviePic2)){
			count++;
		}
	}
	
	if (!isValid){
		alert(alertString);
	}
	return isValid;
}
function movieTypeSelectForm_onchange(e){
	var controlObj = e.target;
	var selectedVal = $('.movieTypeSelectForm').val();
	$('.movieTypeForm').attr('value', selectedVal);
	$('.movieTypeForm').val(selectedVal);
}
function movieClassSelectForm_onchange(e){
	var controlObj = e.target;
	var selectedVal = $('.movieClassSelectForm').val();
	$('.movieClassForm').attr('value', selectedVal);
	$('.movieClassForm').val(selectedVal);
}

function movieEnNameFormInput_onchange(e){
	var controlObj = e.target;
	
}
function movieTcNameFormInput_onchange(e){
	var controlObj = e.target;
}
function moviePic1Input_onchange(e){
	var controlObj = e.target;
	$('.moviePic1Img').attr('src', $(controlObj).val());
}
function moviePic2Input_onchange(e){
	var controlObj = e.target;
	$('.moviePic2Img').attr('src', $(controlObj).val());
}
function refreshMoviePic1(){
	refreshMoviePic1_onclick(null);
}
function refreshMoviePic2(){
	refreshMoviePic2_onclick(null);
}
function refreshMoviePic1_onclick(e){
	var controlObj = null;
	if (!isUndefinedOrIsNull(e)){
		controlObj = e.target;		
	}

	var moviePicInput = $('.moviePic1Form');
	$('.moviePic1Img').attr('src', $(moviePicInput).val());
}
function refreshMoviePic2_onclick(e){
	var controlObj = null;
	if (!isUndefinedOrIsNull(e)){
		controlObj = e.target;		
	}
	var moviePicInput = $('.moviePic2Form');
	$('.moviePic2Img').attr('src', $(moviePicInput).val());
}