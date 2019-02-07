// JavaScript Document
$(document).ready(function(){ 
	checkDataChangeByInterval();
}); // end $(document).ready



var movieTcNameInputVal = '';
var movieEnNameInputVal = '';
var movieClassInputControlVal = '';
var movieTypeInputControlVal = '';
var movieTcNameInputValTemp = '';
var movieEnNameInputValTemp = '';
var movieClassInputControlValTemp = '';
var movieTypeInputControlValTemp = '';
var anyValueChange = false;
var CHECK_DATA_INTERVAL = 3000;
function checkDataChangeByInterval(){
	setInterval(function(){
		movieTcNameInputValTemp = $('.movieTcNameInputLu').val();
		movieEnNameInputValTemp = $('.movieEnNameInputLu').val();
		movieClassInputControlValTemp = $('.movieTypeInputControl').val();
		movieTypeInputControlValTemp = $('.movieClassInputControl').val();
		
		if (!isUndefinedOrIsNull(movieTcNameInputValTemp)){
			if (movieTcNameInputValTemp != movieTcNameInputVal){
				anyValueChange = true;
				movieTcNameInputVal = movieTcNameInputValTemp;
			}
		}
		
		if (!isUndefinedOrIsNull(movieEnNameInputValTemp)){
			if (movieEnNameInputValTemp != movieEnNameInputVal){
				anyValueChange = true;
				movieEnNameInputVal =  movieEnNameInputValTemp;
			}
		}
		if (!isUndefinedOrIsNull(movieClassInputControlValTemp)){
			if (movieClassInputControlValTemp != movieClassInputControlVal){
				anyValueChange = true;
				movieClassInputControlVal = movieClassInputControlValTemp;
			}
		}
		if (!isUndefinedOrIsNull(movieTypeInputControlValTemp)){
			if (movieTypeInputControlValTemp != movieTypeInputControlVal){
				anyValueChange = true;
				movieTypeInputControlVal = movieTypeInputControlValTemp;
			}
		}
		if (anyValueChange){
			doLookup();
		}
	}, CHECK_DATA_INTERVAL);
}
function bindMovieLookupControl(movieVo){
	if (!isUndefinedOrIsNull(movieVo)){
		if (!isUndefinedOrIsNull(movieVo.movieNameEn)){
			var movieEnNameInputLu = $('.movieEnNameInputLu');
			if (movieEnNameInputLu.length > 0){
				$(movieEnNameInputLu).val(movieVo.movieNameEn);
			}
		}
		if (!isUndefinedOrIsNull(movieVo.movieNameTc)){
			var movieTcNameInputLu = $('.movieTcNameInputLu');
			if (movieTcNameInputLu.length > 0){
				$(movieTcNameInputLu).val(movieVo.movieNameTc);				
			}
		}
	}
}
function createMovieVo(){
	var movieVo = {};
	movieVo.id = -1;
	movieVo.movieNameEn = '';
	movieVo.movieNameTc = '';
	movieVo.movieTypeId = -1;
	movieVo.movieTypeString = '';
	movieVo.classCode = '';
	movieVo.classCodeString = '';
	movieVo.moviePic1 = '';
	movieVo.moviePic2 = '';
	movieVo.movieTrailor = '';
	movieVo.createdBy = '';
	movieVo.updatedBy = '';
	movieVo.createdDate = new Date();
	movieVo.createdDateString = getDateString_YYYYMMDD_HHMMSS();
	movieVo.updatedDate = new Date();
	movieVo.updatedDateString = getDateString_YYYYMMDD_HHMMSS();
	movieVo.remarks = '';
	return movieVo;
}

function doLookup(){
	var movieVo = createMovieVo();
	
	movieVo.movieNameTc = movieTcNameInputVal;
	movieVo.movieNameEn = movieEnNameInputVal;
	movieVo.classCode = movieClassInputControlVal;
	movieVo.movieTypeId = movieTypeInputControlVal;
	
	anyValueChange = false;
	postLookupMovie(movieVo);
}
function postLookupMovie(movieVo){
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
		lookupMovieCallBack(data);
//		alert("Promise success callback.");
	}).fail(function(jqXHR, status, err) {
//		alert("Promise error callback.");
	}).always(function() {
//		alert("Promise completion callback.");
	})
}
function collectMovieVoFromLookup(trObj){
	var movieVo = createMovieVo();
	if (trObj.length > 0){
		var idTd = $(trObj).find('.idLur');
		var movieNameEnTd = $(trObj).find('.movieNameEnLur');
		var movieNameTcTd = $(trObj).find('.movieNameTcLur');
		var movieTypeIdTd =	$(trObj).find('.movieTypeIdLur');
		var classCodeTd = $(trObj).find('.classCodeLur');
		var moviePic1Td = $(trObj).find('.moviePic1Lur');
		var moviePic2Td = $(trObj).find('.moviePic2Lur');
		var movieTrailorTd = $(trObj).find('.movieTrailorLur');
		var createdByTd = $(trObj).find('.createdByLur');
		var createdDateStringTd = $(trObj).find('.createdDateStringLur');
		var updatedByTd = $(trObj).find('.updatedByLur');
		var updatedDateStringTd = $(trObj).find('.updatedDateStringLur');
		var remarksTd = $(trObj).find('.remarksLur');
		

		if (isObjectFound(idTd)){
			movieVo.id = $(idTd).html();
		}
		if (isObjectFound(movieNameEnTd)){
			movieVo.movieNameEn = $(movieNameEnTd).html();
		}
		if (isObjectFound(movieNameTcTd)){
			movieVo.movieNameTc = $(movieNameTcTd).html();
		}
		if (isObjectFound(movieTypeIdTd)){
			 var movieTypeIdInput= $(movieTypeIdTd).find('.movieTypeIdInput');
			 if (movieTypeIdInput.length > 0){
				 movieVo.movieTypeId = $(movieTypeIdInput).val();				 
			 }
		}
		if (isObjectFound(classCodeTd)){
			var classCodeInput = $(classCodeTd).find('.classCodeInput');
			if (classCodeInput.length >0){
				movieVo.classCode = $(classCodeInput).val();				
			}

		}
		if (isObjectFound(moviePic1Td)){
			movieVo.moviePic1 = $(moviePic1Td).html();
		}
		if (isObjectFound(moviePic2Td)){
			movieVo.moviePic2 = $(moviePic2Td).html();
		}
		if (isObjectFound(movieTrailorTd)){
			movieVo.movieTrailor = $(movieTrailorTd).html();
		}
		if (isObjectFound(createdByTd)){
			movieVo.createdBy = $(createdByTd).html();
		}
		if (isObjectFound(createdDateStringTd)){
			movieVo.createdDateString = $(createdDateStringTd).html();
		}
		if (isObjectFound(updatedByTd)){
			movieVo.updatedBy = $(updatedByTd).html();
		}
		if (isObjectFound(updatedDateStringTd)){
			movieVo.updatedDateString = $(updatedDateStringTd).html();
		}
		if (isObjectFound(remarksTd)){
			movieVo.remarks = $(remarksTd).html();
		}
	}
	return movieVo;
}
function movieLookupTableTr_onclick(e){
	var controlObj = e.target;
	var trObj = $(controlObj).parent();
	$(trObj).addClass('selected').siblings().removeClass('selected');
	var trObj=$(controlObj).parent();
	var movieVo = collectMovieVoFromLookup(trObj);
	if (!isUndefinedOrIsNull(movieVo)){
		if ($.isFunction(movieLookupSelectCallBack)){
			movieLookupSelectCallBack(movieVo);
		} else {
			console.log('no movieLookupSelectCallBack function');
		}
	} else {
		console.log('Please check! MovieVo is null or undefined somehow!');
	}
}
function lookupMovieCallBack(jsonStr) {
	var moviePageVo = JSON.parse(jsonStr);
	var movieVo = moviePageVo.movieVo;
	var movieVoArray = moviePageVo.movieVoArray;
	if (isUndefinedOrIsNull(moviePageVo)) {
		console.log('Abnormal nullable data return');
		return;
	}
	var tbodyHtml = '';
	if (movieVoArray.length > 0) {
		$('.movieLookupTable > tbody').empty();
		$.each( movieVoArray, function( key, value ) {
			  var vo = value;
			  tbodyHtml += '<tr class="hoverTr" onclick="movieLookupTableTr_onclick(event)">';
				  tbodyHtml += '<td class="nonDisplayTableColumn idLur">';
				  if (!isUndefinedOrIsNull(vo.id)){
					  tbodyHtml += vo.id;
				  }
				  tbodyHtml += '</td>';
				  
				  tbodyHtml += '<td class="movieNameEnLur">';
				  if (!isUndefinedOrIsNull(vo.movieNameEn)){
					  tbodyHtml += vo.movieNameEn;
				  }
				  tbodyHtml += '</td>';
				  
				  tbodyHtml += '<td class="movieNameTcLur">';
				  if (!isUndefinedOrIsNull(vo.movieNameTc)){
					  tbodyHtml += vo.movieNameTc;
				  }
				  tbodyHtml += '</td>';
				  
				  tbodyHtml += '<td class="movieTypeIdLur">';
				  var movieTypeString = '';
				  if (!isUndefinedOrIsNull(vo.movieTypeString)){
					  movieTypeString = vo.movieTypeString;
				  }
				  tbodyHtml += '<span class="movieTypeStringSpan"/>' + movieTypeString + '</span>';
				  var movieTypeId = -1;
				  if (!isUndefinedOrIsNull(vo.movieTypeId)){
					  movieTypeId = vo.movieTypeId;
				  }
				  tbodyHtml += '<input type="hidden" class="movieTypeIdInput" value="' + movieTypeId + '"/>';
				  tbodyHtml += '</td>';
				  
				  tbodyHtml += '<td class="classCodeLur">';
				  var classCodeString = '';
				  if (!isUndefinedOrIsNull(vo.classCodeString)){
					  classCodeString = vo.classCodeString;
				  }
				  tbodyHtml += '<span class="classCodeStringSpan"/>' + classCodeString + '</span>';
				  var classCode = '';
				  if (!isUndefinedOrIsNull(vo.classCode)){
					  classCode = vo.classCode;
				  }
				  tbodyHtml += '<input type="hidden" class="classCodeInput" value="' + classCode + '"/>';
				  tbodyHtml += '</td>';
				  
				  tbodyHtml += '<td class="moviePic1Lur">';
				  var moviePic1 = '';
				  if (!isUndefinedOrIsNull(vo.moviePic1)){
					  moviePic1 = vo.moviePic1;
				  }
				  tbodyHtml += moviePic1;
				  tbodyHtml += '</td>';
				  
				  tbodyHtml += '<td class="moviePic2Lur">';
				  var moviePic2 = '';
				  if (!isUndefinedOrIsNull(vo.moviePic2)){
					  moviePic2 = vo.moviePic2;
				  }
				  tbodyHtml += moviePic2;
				  tbodyHtml += '</td>';
				  
				  tbodyHtml += '<td class="movieTrailorLur">';
				  var movieTrailor = '';
				  if (!isUndefinedOrIsNull(vo.movieTrailor)){
					  movieTrailor = vo.movieTrailor;
				  }
				  tbodyHtml += movieTrailor;
				  tbodyHtml += '</td>';
				  
				  tbodyHtml += '<td class="nonDisplayTableColumn createdByLur">';
				  var createdBy = '';
				  if (!isUndefinedOrIsNull(vo.createdBy)){
					  createdBy = vo.createdBy;
				  }
				  tbodyHtml += createdBy;
				  tbodyHtml += '</td>';
				  
				  tbodyHtml += '<td class="createdDateStringLur">';
				  var createdDateString = '';
				  if (!isUndefinedOrIsNull(vo.createdDateString)){
					  createdDateString = vo.createdDateString;
				  }
				  tbodyHtml += createdDateString;
				  tbodyHtml += '</td>';
				  
				  tbodyHtml += '<td class="nonDisplayTableColumn updatedByLur">';
				  var updatedBy = '';
				  if (!isUndefinedOrIsNull(vo.updatedBy)){
					  updatedBy = vo.updatedBy;
				  }
				  tbodyHtml += updatedBy;
				  tbodyHtml += '</td>';
				  
				  tbodyHtml += '<td class="updatedDateStringLur">';
				  var updatedDateString = '';
				  if (!isUndefinedOrIsNull(vo.updatedDateString)){
					  updatedDateString = vo.updatedDateString;
				  }
				  tbodyHtml += updatedDateString;
				  tbodyHtml += '</td>';
				  
				  tbodyHtml += '<td class="remarksLur">';
				  var remarks = '';
				  if (!isUndefinedOrIsNull(vo.remarks)){
					  remarks = vo.remarks;
				  }
				  tbodyHtml += remarks;
				  tbodyHtml += '</td>';
			  tbodyHtml += '</tr>';
		});
		$('.movieLookupTable > tbody').append(tbodyHtml);
		
	} else {
		$('.movieLookupTable > tbody').empty();
		var tbodyHtml = '<tr>';
		var noRecordFound = getBundle_NoRecordFound();
		
		tbodyHtml += '<td colspan="13">' + noRecordFound + '</td>';
		tbodyHtml += '</tr>';
		$('.movieLookupTable > tbody').append(tbodyHtml);
	}

}
function moviePic1Input_onchange(e){
	var controlObj = e.target;
	$('.moviePic1Img').attr('src', $(controlObj).val());
}

function refreshInput_onclick(e){
	var controlObj = e.target;
	doLookup();
}
function movieTcNameInput_onchange(e){
	var controlObj = e.target;
	//refreshDataAfterAnInterval();
}
function movieEnNameInput_onchange(e){
	var controlObj = e.target;
	//refreshDataAfterAnInterval();
}



function checkDataChange(){
	setTimeout(function(){
		
	}, 300);
}