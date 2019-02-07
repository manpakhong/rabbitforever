/**
 * 
 */
var windowsWidth;
var windowsHeight;
var movieDetailsDialog;
var movieWaitingSaveDialog;
var movieLookupDialog;
function getWindowsResolution(){
	windowsWidth = window.screen.availWidth;
	windowsHeight = window.screen.availHeight;
	
	windowsWidth = windowsWidth * 0.85;
	windowsHeight = windowsHeight * 0.85;
	$('.background').css('width', windowsWidth);
	$('.background').css('height', windowsHeight);
}
//prevent Bootstrap from hijacking TinyMCE modal focus
$(document).on('focusin', function(e) {
	if ($(e.target).closest(".mce-window").length) {
		e.stopImmediatePropagation();
	}
});

$(document).ready(function(){
	getWindowsResolution();
	prepareMovieDetailsDialog();
	prepareMovieLookupDialog();
	prepareMovieWaitingSaveConfirmationDialog();
	movieDetailsDialog.dialog("close");
	movieWaitingSaveDialog.dialog("close");
	movieLookupDialog.dialog("close");
	addEventHandlers();
}); // end $(document).ready

var currentCallerTr = null;
function addEventHandlers(){
	$('.movieNameTcInput').on('click', function (event){
		movieNameTcInput_onclick(event);
	});
	$('.movieNameEnInput').on('click', function (event){
		movieNameEnInput_onclick(event);
	});
	$('.statusStringInput').on('click', function (event){
		statusStringInput_onclick(event);
	});

}
function getNextSeqFromMovieWaitingList(){
	var maxSeq = -1;
	var movieWaitingTable = $('.moviewaitingtable');
	var allTrs = $(movieWaitingTable).find('tr');
	var dataIndex = 1;
	if (allTrs.length > 0){
		$(allTrs).each(function(index){
			if (index > dataIndex){
				var waitingSeqInput = $(this).find('.waitingSeqInput');
				if (waitingSeqInput.length > 0){
					var seqString = $(waitingSeqInput).val();
					var seq = tryParseInt(seqString);
					if (!isUndefinedOrIsNull(seq)){
						if (maxSeq < seq){
							maxSeq = seq;
						}
					}
				}
			}
		});
	}
	if (maxSeq == -1){
		maxSeq = 1;
	} else {
		maxSeq++;
	}
	return maxSeq;
}
function movieNameTcInput_onclick(e){
	var controlObj = e.target;
	var trObj = $(controlObj).parent().parent();
	currentCallerTr = trObj;
	
	var movieIdInput = $(trObj).find('.movieIdInput');
	var idInput = $(trObj).find('.idInput');

//	alert($(movieIdInput).val());
//	alert($(idInput).val());
//	openMovieLookupDiv(e);
	var movieVo = collectMovieVoFromInputParent(trObj);
	openMovieDetailsDiv(e);
}

function movieNameEnInput_onclick(e){
	var controlObj = e.target;
	var trObj = $(controlObj).parent().parent();
	currentCallerTr = trObj;
	
	var movieIdInput = $(trObj).find('.movieIdInput');
	var idInput = $(trObj).find('.idInput');

//	alert($(movieIdInput).val());
//	alert($(idInput).val());
//	openMovieLookupDiv(e);
	openMovieDetailsDiv(e);
}
function statusStringInput_onclick(e){
	var controlObj = e.target;
	var trObj = $(controlObj).parent().parent();
	currentCallerTr = trObj;
	
	var movieIdInput = $(trObj).find('.movieIdInput');
	var idInput = $(trObj).find('.idInput');
	
//	alert($(movieIdInput).val());
//	alert($(idInput).val());
	
//	openMovieLookupDiv(e);
	
	
	openMovieDetailsDiv(e);
}

function openMovieDetailsDiv(e){
	var controlObj = e.target;
	var trObj = $(controlObj).parent().parent();
	var rowIndex = trObj.index();
	if (rowIndex == 0){
		var text = $(controlObj).val();
	//	alert(text);
		var movieWaitingVo = collectMovieWaitingVoByTrObj(trObj);
		movieDetailsDialog.dialog("open");
	}
}

function openMovieLookupDiv(e){
	var controlObj = e.target;
	var trObj = $(controlObj).parent().parent();
	var text = $(controlObj).val();
//		alert(text);
	movieLookupDialog.dialog("open");		
}


function bindTrValueToMovieWaitingRow(){
	if (!isUndefinedOrIsNull(currentCallerTr)){
		var idInput = $(currentCallerTr).find('.idInput');
		var movieIdInput = $(currentCallerTr).find('.movieIdInput');
		var waitingSeqInput = $(currentCallerTr).find('.waitingSeqInput');
		var movieNameTcInput = $(currentCallerTr).find('.movieNameTcInput');
		var movieNameEnInput = $(currentCallerTr).find('.movieNameEnInput');
		var statusStringInput = $(currentCallerTr).find('.statusStringInput');
		var statusInput = $(currentCallerTr).find('.statusInput');
		
		
		var movieVo = collectMovieVoFromMovieControl();
		if (!isUndefinedOrIsNull(movieVo)){
			if (!isUndefinedOrIsNull(movieVo.id)){
				$(movieIdInput).attr('value', movieVo.id);
			}
			if (!isUndefinedOrIsNull(movieVo.movieNameEn)){
				$(movieNameEnInput).attr('value',movieVo.movieNameEn);
			}
			if (!isUndefinedOrIsNull(movieVo.movieNameTc)){
				$(movieNameTcInput).attr('value',movieVo.movieNameTc);
			}
			if (!isUndefinedOrIsNull(movieVo.id) && movieVo.id != -1){
				var nextSeq = getNextSeqFromMovieWaitingList();
				$(waitingSeqInput).attr('value',nextSeq);
				$(statusInput).attr('value', MOVIE_STATUS_PENDING);
				var movieStatusPendingInput = $('.MOVIE_STATUS_PENDING');
				if (movieStatusPendingInput.length > 0){
					var movieStatusPendingString = $(movieStatusPendingInput).val();
					$(statusStringInput).attr('value',movieStatusPendingString);
				}
			}
		}
	}

}
function getUserName() {
	var userName = '';
	if ($('.userNameInput').length) {
		userName = $('.userNameInput').val();
	}
	return userName;
}
function collectMovieWaitingVoByTrObj(trObj){
	var movieWaitingVo = createMovieWaitingVo();
	
	var waitingSeqInput = $(trObj).find('.waitingSeqInput');
	var waitingSeq = null;
	
	if (waitingSeqInput.length > 0){
		var waitingSeqString = $(waitingSeqInput).val();
		var waitingSeq = parseInt(waitingSeqString);
	}
	
	var movieNameTcInput = $(trObj).find('.movieNameTcInput');
	var movieNameTcString = null;
	if (movieNameTcInput.length > 0){
		movieNameTcString = $(movieNameTcInput).val();
	}
	
	
	var movieNameEnInput = $(trObj).find('.movieNameEnInput');
	var movieNameEnString = null;
	if (movieNameEnInput.length > 0){
		movieNameEnString = $(movieNameEnInput).val();
	}

	var statusStringInput = $(trObj).find('.statusStringInput');
	var statusString = null;
	if(statusStringInput.length > 0){
		statusString = $(statusStringInput).val();
	}
	
	var statusInput = $(trObj).find('.statusInput');
	var status = null;
	if (statusInput.length > 0){
		status = $(statusInput).val();
	}
	
	var movieIdInput = $(trObj).find('.movieIdInput');
	var movieId = -1;
	if (movieIdInput.length > 0){
		var movieIdString = $(movieIdInput).val();
		movieId = parseInt(movieIdString);
	}
	
	
	var idInput = $(trObj).find('.idInput');
	var id = -1;
	if (idInput.length > 0){
		var idString = $(idInput).val();
		id = parseInt(idString);
	}
	
	var createdByInput = $(trObj).find('.createdByInput');
	var createdBy = null;
	if (createdByInput.length > 0){
		createdBy = $(createdByInput).val();
	}
	
	var updatedByInput = $(trObj).find('.updatedByInput');
	var updatedBy = null;
	if (updatedByInput.length > 0){
		updatedBy = $(updatedByInput).val();
		movieWaitingVo.updatedBy = updatedBy;
	}

	var userName = getUserName();
	if (!isUndefinedOrIsNull(userName) && userName != '') {
		movieWaitingVo.updatedBy = userName;
	}

	
		
	movieWaitingVo.id = id;
	movieWaitingVo.movieId = movieId;
	movieWaitingVo.movieNameTc = movieNameTcString;
	movieWaitingVo.movieNameEn = movieNameEnString;
	movieWaitingVo.waitingSeq = waitingSeq;
	movieWaitingVo.status = status;
	movieWaitingVo.statusString = statusString;
	
	

	
	movieWaitingVo.createdBy = createdBy;

	movieWaitingVo.updatedDate = new Date();
	movieWaitingVo.createdDate = new Date();
	movieWaitingVo.createdDateString = getDateString_YYYYMMDD_HHMMSS();
	movieWaitingVo.updatedDateString = getDateString_YYYYMMDD_HHMMSS();
	movieWaitingVo.remarks = '';
	
	return movieWaitingVo;
}
function collectMovieVoFromInputParent(trObj){
	var movieVo = createMovieVo();
	
	var waitingSeqInput = $(trObj).find('.waitingSeqInput');
	var waitingSeq = null;
	
	if (waitingSeqInput.length > 0){
		var waitingSeqString = $(waitingSeqInput).val();
		var waitingSeq = parseInt(waitingSeqString);
	}
	
	var movieNameTcInput = $(trObj).find('.movieNameTcInput');
	var movieNameTcString = null;
	if (movieNameTcInput.length > 0){
		movieNameTcString = $(movieNameTcInput).val();
	}
	
	
	var movieNameEnInput = $(trObj).find('.movieNameEnInput');
	var movieNameEnString = null;
	if (movieNameEnInput.length > 0){
		movieNameEnString = $(movieNameEnInput).val();
	}

	var statusStringInput = $(trObj).find('.statusStringInput');
	var statusString = null;
	if(statusStringInput.length > 0){
		statusString = $(statusStringInput).val();
	}
	
	var statusInput = $(trObj).find('.statusInput');
	var status = null;
	if (statusInput.length > 0){
		status = $(statusInput).val();
	}
	
	var movieIdInput = $(trObj).find('.movieIdInput');
	var movieId = null;
	if (movieIdInput.length > 0){
		var movieIdString = $(movieIdInput).val();
		movieId = parseInt(movieIdString);
	}
	
	
	var idInput = $(trObj).find('.idInput');
	var id = null;
	if (idInput.length > 0){
		var idString = $(idInput).val();
		id = parseInt(idString);
	}
	
	
	var createdByInput = $(trObj).find('.createdByInput');
	var createdBy = null;
	if (createdByInput.length > 0){
		createdBy = $(createdByInput).val();
	}
	
//	var updatedByInput = $(trObj).find('.updatedByInput');
//	var updatedBy = null;
//	if (updatedByInput.length > 0){
//		updatedBy = $(updatedByInput).val();
//	}
	
	
	var userName = getUserName();
	if (!isUndefinedOrIsNull(userName)) {
		movieVo.updatedBy = userName;
	}
	
	movieVo.id = id;
	movieVo.movieNameEn = movieNameEnString;
	movieVo.movieNameTc = movieNameTcString;
	movieVo.movieTypeId = -1;
	movieVo.movieTypeString = '';
	movieVo.classCode = '';
	movieVo.classCodeString = '';
	movieVo.moviePic1 = '';
	movieVo.moviePic2 = '';
	movieVo.movieTrailor = '';
	movieVo.status = statusString;
	movieVo.statusCode = status;
//	movieVo.createdBy = '';
//	movieVo.updatedBy = '';
	movieVo.createdDate = new Date();
	movieVo.createdDateString = getDateString_YYYYMMDD_HHMMSS();
	movieVo.updatedDate = new Date();
	movieVo.updatedDateString = getDateString_YYYYMMDD_HHMMSS();
	movieVo.remarks = '';
	return movieVo;
}




function prepareMovieDetailsDialog(){
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();

	var dialogHeight = windowHeight * 0.7;
	var dialogWidth = windowWidth * 0.7;
	
	var selectLabel = getBundleLangByLabel('select');
	var cancelLabel = getBundleLangByLabel('cancel');
	var saveLabel = getBundleLangByLabel('save');
	
	movieDetailsDialog = $('.movieDetailsDiv').dialog({
		autoOpen : false,
		height : dialogHeight,
		width : dialogWidth,
		modal : true,
		close : function() {
			clearMovieDetailsDialog();
		},
		buttons : [
			{
				text: selectLabel,
				click: function(e) {
					var button = e.target;
					select2MovieWaitingList();			
				}
			},
			{
				text: saveLabel,
//				type: "submit"
				click: function(e){
					saveMovie(e);
				}
			},
			{
				text: cancelLabel,
				click: function(e) {
					movieDetailsDialog.dialog("close");
					clearMovieDetailsDialog();
				}
			}
//			selectLabel : function(e) {
//				var button = e.target;
//				select2MovieWaitingList();			
//			},
//			saveLabel : saveMovie,
//			cancelLabel : function(e) {
//				movieDetailsDialog.dialog("close");
//				clearMovieDetailsDialog();
//			}
//		},
//		close : function() {
//			clearMovieDetailsDialog();
//		},
		],
		dialogClass: 'prepareMovieDetailsDialogClass'
		
	});
	$('.prepareMovieDetailsDialogClass .ui-button:contains(selectLabel)').text(selectLabel);
	$('.prepareMovieDetailsDialogClass .ui-button:contains(cancelLabel)').text(cancelLabel);
	$('.prepareMovieDetailsDialogClass .ui-button:contains(saveLabel)').text(saveLabel);
}

function select2MovieWaitingList(){
	if (validateSelectMovieVoInputFields()){
		bindTrValueToMovieWaitingRow();
		movieDetailsDialog.dialog("close");		
	}

}

function prepareMovieLookupDialog() {
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();
	var dialogHeight = windowHeight * 0.7;
	var dialogWidth = windowWidth * 0.7;
	
	var selectLabel = getBundleLangByLabel('select');
	
	movieLookupDialog = $(".movieLookupDiv").dialog({
		autoOpen : false,
		height : dialogHeight,
		width : dialogWidth,
		modal : true,
		buttons : {
			selectLabel : function(e) {
				selectMovie(e);
			}
		},
		close : function(ev, ui) {
			//$(this).remove();
		},
		dialogClass: 'prepareMovieLookupDialogClass'
	});
	$('.prepareMovieLookupDialogClass .ui-button:contains(selectLabel)').text(selectLabel);
}
function selectMovie(e){
	var button = e.target;
	movieLookupDialog.dialog("close");
}
function prepareMovieWaitingSaveConfirmationDialog(){
	var yesLabel = getBundleLangByLabel('yes');
	var noLabel = getBundleLangByLabel('no');
	movieWaitingSaveDialog = $(".movieWaitingSaveConfirmationDiv").dialog({
		resizable : false,
		height : "auto",
		width : 400,
		modal : true,
		buttons : {
			yesLabel : function(e) {
				var button = e.target;
				saveMovieWaitingVo();
			},
			noLabel : function() {
				$(this).dialog("close");
			}
		},
		dialogClass: 'movieWaitingSaveConfirmationDivClass'
	});
	$('.movieWaitingSaveConfirmationDivClass .ui-button:contains(yesLabel)').text(yesLabel);
	$('.movieWaitingSaveConfirmationDivClass .ui-button:contains(noLabel)').text(noLabel);
}
function saveMovieWaitingVoArray(){
	var tbodyObj = $('.moviewaitingtable').find('tbody');
	var movieWaitingVoArray = collectMovieWaitingVoArray(tbodyObj, false);
	postSaveMovieWaitingVoArray(movieWaitingVoArray);
}
function collectMovieWaitingVoArray(tbodyObj, isIncludedZeroRow){
	var trObjs = $(tbodyObj).find('tr');
	var movieWaitingVoArray = [];
	var beginIndex = 1;
	if (isIncludedZeroRow){
		beginIndex = 0;
	}
	$(trObjs).each(function(i, obj){
		if (i >= beginIndex){
			var movieVo = collectMovieWaitingVoByTrObj(this);
			movieWaitingVoArray.push(movieVo);
		}
	});
	return movieWaitingVoArray;
}
function createMovieWaitingVo(){
	var movieWaitingVo = {};
	movieWaitingVo.id = -1;
	movieWaitingVo.movieId = -1;
	movieWaitingVo.movieNameTc = '';
	movieWaitingVo.movieNameEn = '';
	movieWaitingVo.waitingSeq = 1;
	movieWaitingVo.status = '';
	movieWaitingVo.statusString = '';
	
	var userName = getUserName();
	if (!isUndefinedOrIsNull(userName)) {
		movieWaitingVo.updatedBy = userName;
	}
	var userName = getUserName();
	if (!isUndefinedOrIsNull(userName)) {
		movieWaitingVo.createdBy = userName;
	}
	movieWaitingVo.updatedDate = new Date();
	movieWaitingVo.createdDate = new Date();
	movieWaitingVo.createdDateString = getDateString_YYYYMMDD_HHMMSS();
	movieWaitingVo.updatedDateString = getDateString_YYYYMMDD_HHMMSS();
	movieWaitingVo.remarks = '';
	return movieWaitingVo;
}

function collectMovieWaitingData(){
	var movieWaitingVo = createMovieWaitingVo();
	var idString = $('.idInput').val();
	if (!isUndefinedOrIsNull(idString)){
		movieWaitingVo.id = tryParseInt(idString);
	}
	var movieIdString = $('.movieIdInput').val();
	if (!isUndefinedOrIsNull(movieIdString)){
		movieWaitingVo.movieId = tryParseInt(movieIdString);
	}
	var waitingSeqString = $('.waitingSeqInput').val();
	if (!isUndefinedOrIsNull(waitingSeqString)){
		movieWaitingVo.waitingSeq = tryParseInt(waitingSeqString);
	}
	var movieNameTc = $('.movieNameTcInput').val();
	movieWaitingVo.movieNameTc = movieNameTc;
	var movieNameEn = $('.movieNameEnInput').val();
	movieWaitingVo.movieNameEn = movieNameEn;
	var status = $('.statusInput').val();
	movieWaitingVo.status = status;
	var statusString = $('.statusStringInput').val();
	movieWaitingVo.statusString = statusString;
	
	return movieWaitingVo;
}
function saveMovie(e){
	var controlObj = e.target;
	var movieVo = collectMovieVoFromMovieControl();
	if (validateMovieVoInputFields()){
		postSaveMovieVo(movieVo);
	}
	
}
function closeMovieModal(){
	movieDetailsDialog.dialog("close");
}
function postSaveMovieWaitingVoArray(movieWaitingVoArray) {
	// var data = JSON.stringify(_userObj, null, 2);
	var vo = createVo();
	vo.command = CMD_TYPE_BATCH_SAVE;

	vo.dataClassName = 'MovieWaitingVoArray';
	vo.dataInstance = movieWaitingVoArray;
	var dataString = JSON.stringify(vo);
	dataString = '{' + '"vo": ' + dataString + '}';
	console.log(dataString);
	// dataString = '{' +'"cmdObjectDto": ' + dataString + '}';

	
	$.ajax({
		type : "POST",
		url : "../../../rabbitforever/commands/MovieWaitingPageCommand.php",
		data : {
			data : dataString
		}
	}).done(function(data, status, jqXHR) {
		saveMovieWaitingVoArrayCallBack(data);
//		alert("Promise success callback.");
	}).fail(function(jqXHR, status, err) {
//		alert("Promise error callback.");
	}).always(function() {
//		alert("Promise completion callback.");
	})
}
function saveMovieWaitingVoArrayCallBack(jsonStr){
	var movieWaitingPageVo = JSON.parse(jsonStr);
	var movieWaitingVoArray = movieWaitingPageVo.movieWaitingVoArray;
	var lookupIconButtonSpan = $('.lookupIconButtonSpan');
	if (isUndefinedOrIsNull(movieWaitingPageVo)) {
		console.log('Abnormal nullable data return');
		return;
	} else {
		if (!isUndefinedOrIsNull(movieWaitingPageVo.isSaved) && movieWaitingPageVo.isSaved){
			alert(getBundleLangByLabel('saveSuccessfully'));
			location.reload();
		}
	}

}
function addMovieWaitingListButton_onclick(e){
	var controlObj = e.target;
	var trObj = $(controlObj).parent().parent();
	var tbody = $(trObj).parent();
	currentCallerTr = trObj;
	var maxMovieWaitingSeqNumber = countMaxMovieWaitingSeqNumber(tbody);
	var movieVo = collectMovieVoFromInputParent(trObj);
	var movieWaitingVo = collectMovieWaitingVoByTrObj(trObj);
	var noDuplication = checkDuplicatedMovieOnList(tbody);
	if (!noDuplication){
		var movieOnListLabel = getBundleLangByLabel('movieIsOnWaitingList');
		alert(movieOnListLabel);
		return;
	}
	if (isValidateMovieWaitingVo(movieWaitingVo)){
		movieWaitingVo.waitingSeq = maxMovieWaitingSeqNumber + 1;
		var trHtml = createWaitingListTr(movieWaitingVo);
		var tr2 = trHtml;
		$(tbody).append(tr2);
	} else {
		var cannotFindMovieId = getBundleLangByLabel('cannotFindMovieId');
		alert(cannotFindMovieId);
	}
}

function checkDuplicatedMovieOnList(tbodyObj){
	var noDuplication = true;
	var movieWaitingVoArray = collectMovieWaitingVoArray(tbodyObj, true);
	var movieAddingId = -1;
	for (var i = 0; i < movieWaitingVoArray.length; i++){
		var movieWaitingVo = movieWaitingVoArray[i];
		if (i == 0){
			movieAddingId = movieWaitingVo.movieId;
		} else {
			var currentId = movieWaitingVo.movieId;
			if (movieAddingId == currentId){
				noDuplication = false;
				break;
			}
		}
	}
	return noDuplication;
}

function isValidateMovieWaitingVo(movieWaitingVo){
	var isValid = false;
	if (!isUndefinedOrIsNull(movieWaitingVo.movieId)){
		if (movieWaitingVo.movieId > -1){
			isValid = true;
		}
	}
	return isValid;
}
function countMaxMovieWaitingSeqNumber(tbodyObj){
	var trObjs = $(tbodyObj).find('tr');
	var max = 0;
	$(trObjs).each(function(i, obj){
		if (i > 0){
			var waitingSeqInput = $(this).find('.waitingSeqInput');
			if (waitingSeqInput.length > 0){
				var seqString = $(waitingSeqInput).val();
				if (!isUndefinedOrIsNull(seqString)){
					var seq = tryParseInt(seqString);
					if (!isUndefinedOrIsNull(seq)){
						if (seq > max){
							max = seq;
						}
					}
				}
			}
		}
	});
	return max;
}
function createWaitingListTr(movieWaitingVo){
	var trHtml = '';
	trHtml += '<tr>';
		trHtml += '<td>';
		trHtml += '<input type="button" class="smallbutton deletebutton" onclick="delete_onclick(event)" />';
		trHtml += '<input type="button" class="smallbutton moveupbutton" onclick="moveup_onclick(event)" />';
		trHtml += '<input type="button" class="smallbutton movedownbutton" onclick="movedown_onclick(event)" />';
		trHtml += '</td>';
		
		trHtml += '<td>';
		trHtml += '<input type="text" class="waitingSeqInput moviewaitingseqinput" value="' + movieWaitingVo.waitingSeq + '" onkeyup="movieWaitingSeqInput_onkeyup(event)" />';
		trHtml += '</td>';
		trHtml += '<td>';
		trHtml += '<input type="text" class="movieNameTcInput movienameinput readonlygray" readonly value="' + movieWaitingVo.movieNameTc + '" />';
		trHtml += '</td>';
		trHtml += '<td>';
		trHtml += '<input type="text" class="movieNameEnInput movienameinput readonlygray" readonly value="' + movieWaitingVo.movieNameEn + '" />';
		trHtml += '</td>';
		trHtml += '<td>';
		trHtml += '<input type="text" class="statusStringInput statusstringinput readonlygray" readonly value="' + movieWaitingVo.statusString + '" />';
		trHtml += '<input type="hidden" class="statusInput statusinput readonlygray" readonly value="' + movieWaitingVo.status + '" />';
		trHtml += '</td>';
		trHtml += '<td style="display:none">';
		trHtml += '<input type="hidden" class="movieIdInput movieidinput readonlygray" readonly value="' + movieWaitingVo.movieId + '" />';
		trHtml += '<input type="hidden" class="idInput idinput readonlygray" readonly value="' + movieWaitingVo.id + '" />';
		trHtml += '<input type="hidden" class="createdByInput idinput readonlygray" readonly value="' + movieWaitingVo.createdBy + '" />';
		trHtml += '<input type="hidden" class="updatedByInput idinput readonlygray" readonly value="' + movieWaitingVo.updatedBy + '" />';
		trHtml += '</td>';
	trHtml += '</tr>';
	return trHtml;
}
function saveMovieWaitingListButton_onclick(e){
	var controlObj = e.target;
	var areYouSureLabel = getBundleLangByLabel('areYouSure');
	$('.messageSpan').html(areYouSureLabel);
	saveMovieWaitingVoArray();
}
function delete_onclick(e){
	var controlObj = e.target;
	var trObj = $(controlObj).parent().parent();
	var tbody = $(trObj).parent();
	currentCallerTr = trObj;
	$(trObj).remove();
	rearrangeWaitingSeq();
//	var areYouSureLabel = getBundleLangByLabel('areYouSure');
//	$('.messageSpan').html(areYouSureLabel);
}

function movieWaitingSeqInput_onkeyup(e){
	var controlObj = e.target;
	var trObj = $(controlObj).parent().parent();
	var tbody = $(trObj).parent();
	
	var currentIndex = $(trObj).index();
	if (currentIndex > 0){
		var currentSeq = $(controlObj).val();
		var trObjs = $(tbody).find('tr');
		
		var foundIndex = null;
		$(trObjs).each(function(i, obj){
			if (i > 0){
				var waitingSeqInput = $(this).find('.waitingSeqInput');
				var loopingSeq = $(waitingSeqInput).val();
				if (currentIndex != i){
					if (currentSeq == loopingSeq){
						foundIndex = i;
						$(this).after($(trObj));
					}
				}
//				$(waitingSeqInput).attr('value', i -1);
			}
		});
		
	}
	rearrangeWaitingSeq();
}

function rearrangeWaitingSeq(){
	var trObjs = $('.moviewaitingtable').find('tr');
	var max = 0;
	var index = 1;
	$(trObjs).each(function(i, obj){
		if (i > 1){
			var waitingSeqInput = $(this).find('.waitingSeqInput');
			$(waitingSeqInput).attr('value', index);
			$(waitingSeqInput).val(index);
			index++;
		}
	});
}

function moveup_onclick(e){
	var controlObj = e.target;
	var trObj = $(controlObj).parent().parent();
	var tbody = $(trObj).parent();
	currentCallerTr = trObj;
	var rowIndex = $(trObj).index();
	var row = $(controlObj).parents("tr:first");
	if (rowIndex > 1){
		row.insertBefore(row.prev());
	}
	rearrangeWaitingSeq();
	//movieWaitingSaveDialog.dialog("open");
}
function movedown_onclick(e){
	var controlObj = e.target;
	var trObj = $(controlObj).parent().parent();
	var tbody = $(trObj).parent();
	var table = $(tbody).parent();
	currentCallerTr = trObj;
	var rowIndex = $(trObj).index();
	var row = $(controlObj).parents("tr:first");
	var trs = $(table).find('tr');
	var rowCount = $(trs).length;
	if (rowIndex < (rowCount - 2)){
		row.insertAfter(row.next());
	}
	rearrangeWaitingSeq();
	//movieWaitingSaveDialog.dialog("open");
}
function bindMovieWaitingControl(){
	
}
