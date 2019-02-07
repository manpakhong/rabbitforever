// JavaScript Document
var editDialog;
var categorySelectionDialog;
var cmnMenuControl;
var datePicker;
var ckeditor;
var deletionDialog;
var blogVoCurrent;
var isCkEditor = false;
// prevent Bootstrap from hijacking TinyMCE modal focus
$(document).on('focusin', function(e) {
	if ($(e.target).closest(".mce-window").length) {
		e.stopImmediatePropagation();
	}
});
$(document).ready(function() {
	prepareCmnMenuControl();
	if (isCkEditor) {
		prepareCkEditor();
	} else {
		prepareHtmlEditor();
	}
	prepareCategorySelectionDialog();
	prepareEditDialog();

	prepareDatePicker();
	preparePageData();
	prepareDeletionConfirmationDialog();
	deletionDialog.dialog("close");
	checkQueryString();
	initControlsParams();
	prepareFacebookButton();
}); // end $(document).ready

function initControlsParams(){
	var defaultLanguage = $('.defaultLanguageInput').val();
	var blogLanguageCodeInput = $('.blogLanguageCodeInputModal');
	if (blogLanguageCodeInput.length > 0){
		$(blogLanguageCodeInput).val(defaultLanguage);
	}

}

function checkQueryString(){
	var isEscapePaging = getUrlParam(PAGING_IS_ESCAPE_PAGING);
	var createdBy = getUrlParam(PAGING_CREATED_BY);
	var pageNo = getUrlParam(PAGING_PAGE_NO);
	var lang = getUrlParam(PAGING_LANG);
	
	if (isEscapePaging.length == 0){
		if (pageNo.length == 0){
			reloadQueryStringPage();
		}
	} else {
		if (isEscapePaging != 1){
			if (pageNo.length == 0){
				reloadQueryStringPage();
			}
		}
	}
	
	if (lang.length == 0){
		reloadQueryStringPage();
	}
}
function prepareDeletionConfirmationDialog() {
	var yesLabel = getBundleLangByLabel('yes');
	var noLabel = getBundleLangByLabel('no');
	
	deletionDialog = $(".deleteconfirmationdiv").dialog({
		resizable : false,
		height : "auto",
		width : 400,
		modal : true,
		buttons : {
			yesLabel : function(e) {
				var button = e.target;
				postDeleteBlog(blogVoCurrent);
			},
			noLabel : function() {
				$(this).dialog("close");
			}
		},
		dialogClass: 'deleteConfirmationDivClass'
	});
	$('.deleteConfirmationDivClass .ui-button:contains(yesLabel)').text(yesLabel);
	$('.deleteConfirmationDivClass .ui-button:contains(noLabel)').text(noLabel);
}
function preparePageData() {
	var blogVo = createBlogVo();
	postSelectBlogPageVo(blogVo);
}
function prepareCmnMenuControl() {
	cmnMenuControl = $('.cmnMenuControl').superfish({
		delay : 1000, // one second delay on mouseout
		animation : {
			opacity : 'show',
			height : 'show'
		}, // fade-in and slide-down animation
		speed : 'slow', // faster animation speed
		autoArrows : false, // disable generation of arrow mark-up
	});
}
function prepareDatePicker() {
	datePicker = $('.blogDateInputModal').datepicker({
		appendText : '(dd/mm/yyyy)',
		dateFormat : 'dd/mm/yy'
	});
}
function prepareHtmlEditor() {
	tinymce_editor = tinymce
			.init({
				selector : '#blogEditor',
				theme : 'modern',
				inline : false,
				plugins : [
						'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
						'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
						'save table contextmenu directionality emoticons template paste textcolor' ],
				content_css : '../../views/javascripts/tinymce/skins/lightgray/content.min.css',
				toolbar : 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
			});
}
function prepareCkEditor() {
	ckeditor = CKEDITOR.replace('blogEditor', {
		// extraPlugins: 'filebrowser',
		customConfig : '../ckeditor_simple_config.js',
		filebrowserBrowseUrl : '/browser/browse.php',
		// filebrowserUploadUrl: '../../commands/UploadFileCommand.php'
		filebrowserUploadUrl : '../../commands/UploadFileCommand.php'

	});

}
function hideCkEditorSendItToServerButton() {
	if ($('#88_textInput').length) {
		var dialogContentsTd = $('#88_textInput');

		var sendItToTheServerButton = $(dialogContentsTd).find(
				'#cke_182_uiElement');
		if ($(sendItToTheServerButton).length) {
			$(sendItToTheServerButton).css('display', 'none');
		}
	}
}
function prepareCategorySelectionDialog() {
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();

	var dialogHeight = windowHeight * 0.7;
	var dialogWidth = windowWidth * 0.7

	var selectLabel = getBundleLangByLabel('select');
	var cancelLabel = getBundleLangByLabel('cancel');
	categorySelectionDialog = $(".cascadingcategoryselectiondiv").dialog({
		autoOpen : false,
		height : dialogHeight,
		width : dialogWidth,
		modal : true,
		buttons : {
			selectLabel : selectCategory,
			cancelLabel : function() {
				categorySelectionDialog.dialog("close");
			}
		},
			close : function() {
		},
		dialogClass: 'prepareCategorySelectionDialogClass'
	});
	$('.prepareCategorySelectionDialogClass .ui-button:contains(selectLabel)').text(selectLabel);
	$('.prepareCategorySelectionDialogClass .ui-button:contains(cancelLabel)').text(cancelLabel);
}
function selectCategory(e) {
	var controlObj = e.target;
	var selectedDisplay = $('.categorySelectedDisplayInput').val();
	var selectedVal = $('.categoryIdSelectedInput').val();
	$('.blogCategoryStringInputModal').val(selectedDisplay);
	$('.blogCategoryIdInputModal').val(selectedVal);
	categorySelectionDialog.dialog("close");
}
function prepareEditDialog() {
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();

	var dialogHeight = windowHeight * 0.7;
	var dialogWidth = windowWidth * 0.7
	var saveLabel = getBundleLangByLabel('save');
	var cancelLabel = getBundleLangByLabel('cancel');
	editDialog = $(".blogdialogdiv").dialog({
		autoOpen : false,
		height : dialogHeight,
		width : dialogWidth,
		modal : true,
		buttons : {
			saveLabel : saveBlog,
			cancelLabel : function() {
				editDialog.dialog("close");
			}
		},
		close : function() {

		},
		dialogClass: 'prepareEditDialogClass'
	});
	$('.prepareEditDialogClass .ui-button:contains(saveLabel)').text(saveLabel);
	$('.prepareEditDialogClass .ui-button:contains(cancelLabel)').text(cancelLabel);
}

function clearBlogEditDisplayData() {

}
function removeBlogDialogDivRedBorder(){
	var blogDialogDiv = $('.blogdialogdiv');
	var allInputs = $(blogDialogDiv).find('input');
	var selectInputs = $(blogDialogDiv).find('select');
	$(allInputs).each(function(i){
		$(this).removeClass('boderred');
	})
	
	$(selectInputs).each(function(i){
		$(this).removeClass('boderred');
	})
	
}
function validateBlogEditData(){
	var isValid = true;
	
	removeBlogDialogDivRedBorder();
	
	var blogVo = collectBlogEditData();
	
	var blogIdInput = $('.blogIdInputModel');
	var blogDateInput = $('.blogDateInputModal');
	var blogSubjectInput = $('.blogSubjectInputModal');
	var blogEditorTextArea = $('.blogEditorTextAreaModal');
	var blogCategoryIdInput = $('.blogCategoryIdInputModal');
	var blogCategoryStringInput = $('.blogCategoryStringInputModal');
	var blogCreatedByInput = $('.blogCreatedByInputModal');
	var blogLanguageCodeInput = $('.blogLanguageCodeInputModal');
	var blogRemarksTextArea = $('.blogRemarksTextAreaModal');
	
	var count = 0;
	var alertString = "";
	
	if ($(blogIdInput).length) {
		blogVo.id;
	}
	blogVo.blogDate = new Date();
	if ($(blogDateInput).length) {
		blogVo.blogDateString;
	}
	if ($(blogSubjectInput).length) {
		if (isUndefinedOrIsNull(blogVo.subject) || blogVo.subject == ''){
			if (count > 0){
				alertString += '\n';
			}
			$(blogSubjectInput).addClass('boderred');
			alertString += getBundleLangByLabel('subject') + " " + getBundleLangByLabel('isRequired');
			isValid = false;
			count++;
		}
	}
	if ($(blogEditorTextArea).length) {
		var dataText = '';
		var dataHtml = '';

		if (isCkEditor) {
			dataText = ckeditor.document.getBody().getText();
			dataHtml = ckeditor.getData();
		} else {
			dataText = tinyMCE.activeEditor.getContent({
				format : 'text'
			});
			dataHtml = tinyMCE.activeEditor.getContent({
				format : 'html'
			});
		}
		blogVo.content = dataText;
		blogVo.contentCm = dataHtml;
	}

	if ($(blogCategoryIdInput).length) {
		if (isUndefinedOrIsNull(blogVo.categoryId) || blogVo.categoryId == ''){
			if (count > 0){
				alertString += '\n';
			}
			$(blogCategoryStringInput).addClass('boderred');
			alertString += getBundleLangByLabel('category') + " " + getBundleLangByLabel('isRequired');
			isValid = false;
			count++;
		}
	}
	if ($(blogCreatedByInput).length) {
		blogVo.createdBy = $(blogCreatedByInput).val();
	}
	if ($(blogLanguageCodeInput).length) {
		blogVo.languageCode;
	}
	if ($(blogRemarksTextArea).length) {
		blogVo.remarks;
	}
	if (!isValid){
		alert(alertString);
	}
	
	return isValid;
}
function collectBlogEditData() {
	var blogVo = createBlogVo();
	if ($('.blogIdInputModal').length) {
		var idString = $('.blogIdInputModal').val();
		var id = tryParseInt(idString);
		blogVo.id = id;
	}
	blogVo.blogDate = new Date();
	if ($('.blogDateInputModal').length) {
		blogVo.blogDateString = $('.blogDateInputModal').val();
	}
	if ($('.blogSubjectInputModal').length) {
		blogVo.subject = $('.blogSubjectInputModal').val();
	}
	if ($('.blogEditorTextAreaModal').length) {
		var dataText = '';
		var dataHtml = '';

		if (isCkEditor) {
			dataText = ckeditor.document.getBody().getText();
			dataHtml = ckeditor.getData();
		} else {
			dataText = tinyMCE.activeEditor.getContent({
				format : 'text'
			});
			dataHtml = tinyMCE.activeEditor.getContent({
				format : 'html'
			});
		}
		blogVo.content = dataText;
		blogVo.contentCm = dataHtml;
	}
	var userName = getUserName();
	if ($('.blogCategoryIdInputModal').length) {
		var categoryIdString = $('.blogCategoryIdInputModal').val();
		var categoryId = tryParseInt(categoryIdString);
		blogVo.categoryId = categoryId;
	}
	if ($('.blogCreatedByInputModal').length) {
		blogVo.createdBy = $('.blogCreatedByInputModal').val();
	}
	
	if (isUndefinedOrIsNull(blogVo.createdBy) || blogVo.createdBy == ''){
		blogVo.createdBy = userName;
	}
	
	if ($('.blogLanguageCodeInputModal').length) {
		blogVo.languageCode = $('.blogLanguageCodeInputModal').val();
	}
	if ($('.blogRemarksTextAreaModal').length) {
		blogVo.remarks = $('.blogRemarksTextAreaModal').val();
	}
	// if ($('.userNameInput').length){
	// blogVo.updatedBy = $('.userNameInput').val();
	// }

	if (!isUndefinedOrIsNull(userName)) {
		blogVo.updatedBy = userName;
	}

	blogVo.createdDate = new Date();
	blogVo.createdDateString = getDateString_YYYYMMDD_HHMMSS();
	blogVo.updatedDate = new Date();
	blogVo.updatedDateString = getDateString_YYYYMMDD_HHMMSS();
	return blogVo;
}
function createBlogVo() {
	var blogVo = {};
	blogVo.id = -1;
	blogVo.blogDate = new Date();
	blogVo.blogDateString = getDateString_YYYYMMDD_HHMMSS();
	blogVo.subject = '';
	blogVo.content = '';
	blogVo.contentCm = '';
	blogVo.languageCode = LANG_TC;
	blogVo.categoryId = '';
	blogVo.categoryString = '';
	blogVo.updatedBy = '';
	blogVo.createdBy = '';
	blogVo.createdDate = new Date();
	blogVo.createdDateString = getDateString_YYYYMMDD_HHMMSS();
	blogVo.updatedDate = new Date();
	blogVo.updatedDateString = getDateString_YYYYMMDD_HHMMSS();
	blogVo.remarks = '';
	return blogVo;
}

function collectBlogDisplayData(tableObj) {
	var blogVo = createBlogVo();
	var idInput = $(tableObj).find('.idInput');
	if ($(idInput).length) {
		var idString = $(idInput).val();
		var id = parseInt(idString);
		blogVo.id = id;
	}
	var blogDateSpan = $(tableObj).find('.blogDateSpan');
	blogVo.blogDate = new Date();
	if ($(blogDateSpan).length) {
		blogVo.blogDateString = $(blogDateSpan).html();
		if (!isUndefinedOrIsNull(blogVo.blogDateString)) {
			blogVo.blogDate = convertDateTimeStringToDate(blogVo.blogDateString);
		}
	}
	var subjectH3 = $(tableObj).find('.subjectH3');
	if ($(subjectH3).length) {
		blogVo.subject = $(subjectH3).html();
	}
	var contentTd = $(tableObj).find('.contentTd');
	if ($(contentTd).length) {
		blogVo.content = $(contentTd).html();
	}
	var contentCmTd = '';
	if (isCkEditor) {
		contentCmTd = $(tableObj).find('.contentCmTd p');
	} else {
		contentCmTd = $(tableObj).find('.contentCmTd');
	}
	if ($(contentCmTd).length) {
		blogVo.contentCm = $(contentCmTd).html();
	}
	var languageCodeInput = $(tableObj).find('.languageCodeInput');
	if ($(languageCodeInput).length) {
		blogVo.languageCode = $(languageCodeInput).val();
	}
	var categoryIdInput = $(tableObj).find('.categoryIdInput');
	if ($(categoryIdInput).length) {
		var categoryIdString = $(categoryIdInput).val();
		var categoryId = parseInt(categoryIdString);
		blogVo.categoryId = categoryId;
	}
	var categoryStringInput = $(tableObj).find('.categoryDisplayInput');
	if ($(categoryStringInput).length) {
		var categoryString = $(categoryStringInput).val();
		blogVo.categoryString = categoryString;
	}
	var createdByInput = $(tableObj).find('.createdByInput');
	if ($(createdByInput).length) {
		blogVo.createdBy = $(createdByInput).val();
	}
	var updatedByInput = $(tableObj).find('.updatedByInput');
	if ($(updatedByInput).length) {
		blogVo.updatedBy = $(updatedByInput).val();
	}
	var blogRemarksInput = $(tableObj).find('.blogRemarksInput');
	if ($(blogRemarksInput).length) {
		blogVo.remarks = $(blogRemarksInput).val();
	}
	var userNameInput = $(tableObj).find('.userNameInput');
	if ($(userNameInput).length) {
		blogVo.updatedBy = $(userNameInput).val();
	}
	blogVo.createdDate = new Date();
	var createdDateStringInput = $(tableObj).find('.createdDateStringInput');
	if ($(createdDateStringInput).length) {
		blogVo.createdDateString = $(createdDateStringInput).val();
		if (!isUndefinedOrIsNull(blogVo.createdDateString)) {
			blogVo.createdDate = convertDateTimeStringToDate(blogVo.createdDateString);
		}
	}
	blogVo.updatedDate = new Date();
	blogVo.updatedDateString = getDateString_YYYYMMDD_HHMMSS();

	var remarksInput = $(tableObj).find('.remarksInput');
	if ($(remarksInput).length) {
		blogVo.remarks = $(remarksInput).val();
	}
	return blogVo;
}
function editBlog(e) {
	var controlObj = e.target;
	var td = $(controlObj).parent();
	var tr = $(td).parent();
	var tbody = $(tr).parent();
	var table = $(tbody).parent();
	var blogVo = collectBlogDisplayData(table);
	fillSelectedBlogToBlogEditForm(blogVo);

	editDialog.dialog("open");
	// alert($(idInput).val());
}
function fillSelectedBlogToBlogEditForm(blogVo) {
	$('.blogIdInputModal').val(blogVo.id);
	var blogDate = getDateStringFromDisplayDateTimeString(blogVo.blogDateString);
	$('.blogDateInputModal').val(blogDate);
	$('.blogSubjectInputModal').val(blogVo.subject);
	$('.blogCreatedByInputModal').val(blogVo.createdBy);
	$('.blogCategoryIdInputModal').val(blogVo.categoryId);
	$('.blogCategoryStringInputModal').val(blogVo.categoryString);
	$('.blogContentInputModal').val(blogVo.content);
	$('.languageselect').val(blogVo.languageCode);
	$('.blogLanguageCodeInputModal').val(blogVo.languageCode);
	if (isCkEditor) {
		ckeditor.setData(blogVo.contentCm);
	} else {
		tinyMCE.activeEditor.setContent(blogVo.contentCm);
	}
	$('.blogRemarks').val(blogVo.remarks);
}
function postSelectBlogPageVo(blogVo) {
	// var data = JSON.stringify(_userObj, null, 2);
	var vo = createVo();
	if (blogVo.id == -1) {
		vo.command = CMD_TYPE_SELECT;
	}
	vo.dataClassName = 'BlogVo';
	vo.dataInstance = blogVo;
	var dataString = JSON.stringify(vo);
	dataString = '{' + '"vo": ' + dataString + '}';
	console.log(dataString);
	// dataString = '{' +'"cmdObjectDto": ' + dataString + '}';

	$.ajax({
		type : "POST",
		url : "../../../rabbitforever/commands/BlogPageCommand.php",
		data : {
			data : dataString
		}
	}).done(function(data, status, jqXHR) {
		selectBlogPageVoCallBack(data);
//		alert("Promise success callback.");
	}).fail(function(jqXHR, status, err) {
//		alert("Promise error callback.");
	}).always(function() {
//		alert("Promise completion callback.");
	})

	// $.post('../../../rabbitforever/commands/BlogPageCommand.php', { data:
	// dataString }, selectBlogPageVoCallBack, "text");

}
function selectBlogPageVoCallBack(jsonStr) {
	if (!isUndefinedOrIsNull(jsonStr)) {
		if (jsonStr.length == 0) {
			return;
		}
		var blogPageVo = JSON.parse(jsonStr);
		if (isUndefinedOrIsNull(blogPageVo)) {
			alert(getBundleLangByLabel('abnormal_nullable_data_return'));
			return;
		}
	}

}
function postSaveBlog(blogVo) {
	// var data = JSON.stringify(_userObj, null, 2);
	var vo = createVo();
	if (blogVo.id == -1) {
		vo.command = CMD_TYPE_INSERT;
	} else {
		vo.command = CMD_TYPE_UPDATE;
	}
	vo.dataClassName = 'BlogVo';
	vo.dataInstance = blogVo;
	var dataString = JSON.stringify(vo);
	dataString = '{' + '"vo": ' + dataString + '}';
	console.log(dataString);
	// dataString = '{' +'"cmdObjectDto": ' + dataString + '}';

	
	$.ajax({
		type : "POST",
		url : "../../../rabbitforever/commands/BlogPageCommand.php",
		data : {
			data : dataString
		}
	}).done(function(data, status, jqXHR) {
		saveBlogCallBack(data);
//		alert("Promise success callback.");
	}).fail(function(jqXHR, status, err) {
//		alert("Promise error callback.");
	}).always(function() {
//		alert("Promise completion callback.");
	})
	
	
	
//	$.post('../../../rabbitforever/commands/BlogPageCommand.php', {
//		data : dataString
//	}, saveBlogCallBack, "text");

}

function saveBlogCallBack(jsonStr) {
	var blogPageVo = JSON.parse(jsonStr);
	if (isUndefinedOrIsNull(blogPageVo)
			|| isUndefinedOrIsNull(blogPageVo.isSaved)) {
		alert(getBundleLangByLabel('abnormal_nullable_data_return'));
		return;
	}
	if (blogPageVo.isSaved) {
		alert(getBundleLangByLabel('saveSuccessfully'));
		var blogVo = blogPageVo.blogVo;
		reloadQueryStringPage();
	}

}
function languageselect_modal_onchange(e){
	var controlObj = e.target;
	var selectedLangVal = $(controlObj).val();
	var blogLanguageCodeInput = $('.blogLanguageCodeInputModal');
	if (blogLanguageCodeInput.length > 0){
		$(blogLanguageCodeInput).val(selectedLangVal);
	}
}
function pageselect_onchange(e) {
	var controlObj = e.target;
	// // similar behavior as an HTTP redirect
	// window.location.replace("http://stackoverflow.com");

	// similar behavior as clicking on a link
	reloadPageSelectChange();
}
function reloadPageSelectChange() {	
	var pageNo = getUrlParam(PAGING_PAGE_NO);
	var createdBy = getUrlParam(PAGING_CREATED_BY);
	var isEscapePaging = getUrlParam(PAGING_IS_ESCAPE_PAGING);
	var menuId = getUrlParam(PAGING_MENU_ID);
	var lang = getUrlParam(PAGING_LANG);
	var blogId = getUrlParam(PAGING_BLOG_ID);
	var selectedPageNo = $(".pageselect").val();
	var fullUri = location.pathname.substring(1);
	var uri = getUriPageFileName(fullUri);
	var count = 0;
	
	if (blogId.length > 0){
		if (count > 0){
			uri += '&';
		} else {
			uri += '?';
		}
		uri += PAGING_BLOG_ID + '=' + blogId;
		count++;
	}
	
	if (menuId.length > 0){
		if (count > 0){
			uri += '&';
		} else {
			uri += '?';
		}
		uri += PAGING_MENU_ID + '=' + menuId;
		count++;
	}
	if (pageNo.length > 0){
		if (!isUndefinedOrIsNull(pageNo)){
			if (count > 0){
				uri += '&';
			} else {
				uri += '?';
			}
			uri += PAGING_PAGE_NO + '=' + selectedPageNo;
			count++;
		}
	} else {
		if (!isUndefinedOrIsNull(selectedPageNo)){
			if (count > 0){
				uri += '&';
			} else {
				uri += '?';
			}

			uri += PAGING_PAGE_NO + '=' + selectedPageNo;
			count++;
		}
	}
	var defaultLang = $('.defaultLanguageInput').val();
	if (lang.length > 0){
		if (count > 0){
			uri += '&';
		} else {
			uri += '?';
		}
		uri += PAGING_LANG + '=' + lang; 
		count++;
	} else {
		if (count > 0){
			uri += '&';
		} else {
			uri += '?';
		}
		uri += PAGING_LANG + '=' + defaultLang;
		count++;
	}
	if (createdBy.length > 0){
		if (count > 0){
			uri += '&';
		} else {
			uri += '?';
		}
		uri += PAGING_CREATED_BY + '=' + createdBy;
		count++;
	}
	if (isEscapePaging.length > 0){
		if (count > 0){
			uri += '&';
		} else {
			uri += '?';
		}
		uri += PAGING_IS_ESCAPE_PAGING + '=' + isEscapePaging;
		count++;
	}

	window.location.href = uri;
}
function reloadQueryStringPage() {	
	var pageNo = getUrlParam(PAGING_PAGE_NO);
	var createdBy = getUrlParam(PAGING_CREATED_BY);
	var isEscapePaging = getUrlParam(PAGING_IS_ESCAPE_PAGING);
	var menuId = getUrlParam(PAGING_MENU_ID);
	var lang = getUrlParam(PAGING_LANG);
	var blogId = getUrlParam(PAGING_BLOG_ID);
	var selectedPageNo = $(".pageselect").val();
	var fullUri = location.pathname.substring(1);
	var uri = getUriPageFileName(fullUri);
	var count = 0;
	
	if (blogId.length > 0){
		if (count > 0){
			uri += '&';
		} else {
			uri += '?';
		}
		uri += PAGING_BLOG_ID + '=' + blogId;
		count++;
	}
	
	if (menuId.length > 0){
		if (count > 0){
			uri += '&';
		} else {
			uri += '?';
		}
		uri += PAGING_MENU_ID + '=' + menuId;
		count++;
	}
	if (pageNo.length > 0){
		if (!isUndefinedOrIsNull(pageNo)){
			if (count > 0){
				uri += '&';
			} else {
				uri += '?';
			}
			uri += PAGING_PAGE_NO + '=' + pageNo;
			count++;
		}
	} else {
		if (!isUndefinedOrIsNull(selectedPageNo)){
			if (count > 0){
				uri += '&';
			} else {
				uri += '?';
			}

			uri += PAGING_PAGE_NO + '=' + selectedPageNo;
			count++;
		} else {
			if (count > 0){
				uri += '&';
			} else {
				uri += '?';
			}
			uri += PAGING_PAGE_NO + '=1';
			count++;
		}
	}
	var defaultLang = $('.defaultLanguageInput').val();
	if (lang.length > 0){
		if (count > 0){
			uri += '&';
		} else {
			uri += '?';
		}
		uri += PAGING_LANG + '=' + lang; 
		count++;
	} else {
		if (count > 0){
			uri += '&';
		} else {
			uri += '?';
		}
		uri += PAGING_LANG + '=' + defaultLang;
		count++;
	}
	if (createdBy.length > 0){
		if (count > 0){
			uri += '&';
		} else {
			uri += '?';
		}
		uri += PAGING_CREATED_BY + '=' + createdBy;
		count++;
	}
	if (isEscapePaging.length > 0){
		if (count > 0){
			uri += '&';
		} else {
			uri += '?';
		}
		uri += PAGING_IS_ESCAPE_PAGING + '=' + isEscapePaging;
		count++;
	}

	window.location.href = uri;
}
function saveBlog(e) {
	var controlObj = e.target;
	var blogVo = collectBlogEditData();
	if (validateBlogEditData()){
		postSaveBlog(blogVo);		
	}

}
function getCurrentLanguageSelection() {
	var languageCode = LANG_TC;
	return languageCode;
}
function getUserName() {
	var userName = '';
	if ($('.userNameInput').length) {
		userName = $('.userNameInput').val();
	}
	return userName;
}

function createCategoryVo() {
	var categoryVo = {};
	categoryVo.id = -1;
	categoryVo.menuId = -1;
	categoryVo.seq = -1;
	categoryVo.lv = -1;
	categoryVo.lvMenuEn = '';
	categoryVo.lvMenuTc = '';
	categoryVo.lvParentMenuId = -1;
	categoryVo.isShown = false;
	categoryVo.isEnabled = false;
	categoryVo.isCategory = true;
	categoryVo.url = '';
	categoryVo.createdBy = '';
	categoryVo.updatedBy = '';
	categoryVo.updatedDate = new Date();
	categoryVo.createdDate = new Date();
	categoryVo.createdDateString = getDateString_YYYYMMDD_HHMMSS();
	categoryVo.updatedDateString = getDateString_YYYYMMDD_HHMMSS();
	categoryVo.remarks = '';
	return categoryVo;
}
function categorySelectChange(e, level) {
	var controlObj = e.target;
	var categorySelectValue = $('.categoryselect' + level).val();
	var categorySelectText = $('.categoryselect' + level + '>option:selected')
			.text();

	if (categorySelectValue != '') {
		var categoryVo = createCategoryVo();
		categoryVo.lv = level;
		categoryVo.menuId = categorySelectValue;
		categoryVo.isShown = true;
		categoryVo.isEnabled = true;
		categoryVo.isCategory = true;
		postRetrieveNextLevelCategoryBlogPageVo(categoryVo);
	}

}

function postRetrieveNextLevelCategoryBlogPageVo(categoryVo) {
	// var data = JSON.stringify(_userObj, null, 2);
	var vo = createVo();
	if (categoryVo.id == -1) {
		vo.command = CMD_TYPE_SELECT;
	}
	vo.dataClassName = 'CategoryVo';
	vo.dataInstance = categoryVo;
	var dataString = JSON.stringify(vo);
	dataString = '{' + '"vo": ' + dataString + '}';
	console.log(dataString);
	// dataString = '{' +'"cmdObjectDto": ' + dataString + '}';

	
	$.ajax({
		type : "POST",
		url : "../../../rabbitforever/commands/BlogPageCommand.php",
		data : {
			data : dataString
		}
	}).done(function(data, status, jqXHR) {
		retrieveNextLevelCategoryBlogPageVoCallBack(data);
//		alert("Promise success callback.");
	}).fail(function(jqXHR, status, err) {
//		alert("Promise error callback.");
	}).always(function() {
//		alert("Promise completion callback.");
	})
	
//	
//	$.post('../../../rabbitforever/commands/BlogPageCommand.php', {
//		data : dataString
//	}, retrieveNextLevelCategoryBlogPageVoCallBack, "text");

}

function retrieveNextLevelCategoryBlogPageVoCallBack(jsonStr) {
	var blogPageVo = JSON.parse(jsonStr);

	var categoryVo = blogPageVo.categoryVo;
	var categoryVoArray = blogPageVo.categoryVoArray;
	if (isUndefinedOrIsNull(blogPageVo) || isUndefinedOrIsNull(categoryVo)) {
		alert(getBundleLangByLabel('abnormal_nullable_data_return'));
		return;
	}

	var currentSelectedLv = categoryVo.lv;
	destoryAllBrWithinSelectDiv(currentSelectedLv);
	destoryCascadingSelectionTheLevelsNext(currentSelectedLv);
	createNewSelectionTheLevelNext(categoryVoArray, currentSelectedLv);
	assignSelectTextsToDisplayInput();
	assignSelectValueToDisplayInput();
}
function assignSelectTextsToDisplayInput() {
	var selectObj = $('.selectdiv >select');
	var i = 0;
	var selectedTextsString = '';
	$(selectObj).each(function(i, obj) {
		var className = $(obj).attr('class');
		var currentText = $(obj).find('option:selected').text();
		if (i > 0 && currentText != '') {
			selectedTextsString += '->';
		}
		selectedTextsString += currentText;
		i++;
	});
	$('.categorySelectedDisplayInput').val(selectedTextsString);
}
function assignSelectValueToDisplayInput() {
	var selectObj = $('.selectdiv >select');
	var i = 0;
	var selectedValuesString = '';
	$(selectObj).each(function(i, obj) {
		var className = $(obj).attr('class');
		var currentVal = $(obj).val();
		if (currentVal != '') {
			selectedValuesString = currentVal;
		}
		i++;
	});
	$('.categoryIdSelectedInput').val(selectedValuesString);
}
function destoryAllBrWithinSelectDiv(currentSelectedLv) {
	if (!isUndefinedOrIsNull(currentSelectedLv)) {
		var selectObj = $('.selectdiv > br');
		var i = 0;
		$(selectObj).each(function(i, obj) {
			var className = $(obj).attr('class');

			if (i > currentSelectedLv) {
				$(obj).remove();
			}
			i++;
		});
	}

}

function destoryCascadingSelectionTheLevelsNext(currentSelectedLv) {
	if (!isUndefinedOrIsNull(currentSelectedLv)) {
		var selectObj = $('.selectdiv select');
		var i = 0;
		$(selectObj).each(function(i, obj) {
			var className = $(obj).attr('class');

			if (i > currentSelectedLv) {
				$(obj).remove();
			}
			i++;
		});
	}
}
function createNewSelectionTheLevelNext(categoryVoArray, currentSelectedLv) {
	var nextSelectedLv = currentSelectedLv + 1;
	if (!isUndefinedOrIsNull(categoryVoArray)) {
		var selectDivObj = $('.selectdiv');
		var htmlString = '';
		htmlString += '<select class="categoryselect categoryselect'
				+ nextSelectedLv + '" onchange="categorySelectChange(event, '
				+ nextSelectedLv + ')">';
		htmlString += '<option value="" selected="selected"></option>';
		for ( var i in categoryVoArray) {
			htmlString += '<option value="' + categoryVoArray[i].menuId + '">';
			if (lang == LANG_EN){
				htmlString += categoryVoArray[i].lvMenuEn; 	
			} else if (lang == LANG_TC){
				htmlString += categoryVoArray[i].lvMenuTc; 	
			}
			htmlString += '</option>';
		}
		htmlString += '</select>';
		htmlString += '<br class="categoryselectbr' + nextSelectedLv + '"/>';
		$(selectDivObj).append(htmlString);
	}

}
function htmlEditorClear() {
	tinyMCE.activeEditor.setContent("");
}
function ckEditorClear() {
	// ckeditor.setData('');
	// for ( instance in ckeditor.instances ){
	// ckeditor.instances[instance].updateElement();
	// ckeditor.instances[instance].setData('');
	// }
}
function clearBlogEditForm() {
	var date = new Date();
	var todayDateString = date2DisplayString(date);
	var userName = getUserName();
	$('.blogIdInputModal').val('-1');
	$('.blogDateInputModal').val(todayDateString);
	$('.blogSubjectInputModal').val('');
	$('.blogCreatedByInputModal').val(userName);
	$('.blogCategoryIdInputModal').val('');
	$('.blogContentInputModal').val('');
//	$('.blogLanguageCodeInputModal').val('');
	initControlsParams();
	htmlEditorClear();
	clearUploadedIndicator();
	// ckEditorClear();
	$('.blogRemarks').val('');
}
function addBlog(e) {
	var controlObj = e.target;
	clearBlogEditForm();
	editDialog.dialog("open");
	hideCkEditorSendItToServerButton();
}
function deleteBlog(e) {
	var controlObj = e.target;
	var td = $(controlObj).parent();
	var tr = $(td).parent();
	var tbody = $(tr).parent();
	var table = $(tbody).parent();
	var blogVo = collectBlogDisplayData(table);
	blogVoCurrent = blogVo;
	fillSelectedBlogToBlogEditForm(blogVo);
	
	var areYouSure = getBundleLangByLabel('areYouSure');
	
	
	$('.messageSpan').html(areYouSure);
	deletionDialog.dialog("open");
}
function doSelection(e) {
	categorySelectionDialog.dialog("open");
}
function postDeleteBlog(blogVo) {
	// var data = JSON.stringify(_userObj, null, 2);
	var vo = createVo();
	if (blogVo.id > 0) {
		vo.command = CMD_TYPE_DELETE;
	}
	vo.dataClassName = 'BlogVo';
	vo.dataInstance = blogVo;
	var dataString = JSON.stringify(vo);
	dataString = '{' + '"vo": ' + dataString + '}';
	console.log(dataString);
	// dataString = '{' +'"cmdObjectDto": ' + dataString + '}';

	$.ajax({
		type : "POST",
		url : "../../../rabbitforever/commands/BlogPageCommand.php",
		data : {
			data : dataString
		}
	}).done(function(data, status, jqXHR) {
		deleteBlogCallBack(data);
//		alert("Promise success callback.");
	}).fail(function(jqXHR, status, err) {
//		alert("Promise error callback.");
	}).always(function() {
//		alert("Promise completion callback.");
	})
	
	
//	$.post('../../../rabbitforever/commands/BlogPageCommand.php', {
//		data : dataString
//	}, deleteBlogCallBack, "text");

}
function deleteBlogCallBack(jsonStr) {
	var blogPageVo = JSON.parse(jsonStr);
	if (isUndefinedOrIsNull(blogPageVo)
			|| isUndefinedOrIsNull(blogPageVo.isSaved)) {
		alert(getBundleLangByLabel('abnormal_nullable_data_return'));
		return;
	}
	if (blogPageVo.isSaved) {
		alert(getBundleLangByLabel('deleteSuccessfully'));
		var blogVo = blogPageVo.blogVo;
		deletionDialog.dialog("close");
		reloadQueryStringPage();
	}

}
