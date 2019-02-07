var CMD_TYPE_NONE = 'NONE';
var CMD_TYPE_SELECT = 'SELECT';
var CMD_TYPE_UPDATE = 'UPDATE';
var CMD_TYPE_DELETE = 'DELETE';
var CMD_TYPE_INSERT = 'INSERT';
var CMD_TYPE_BATCH_SAVE = 'BATCH_SAVE';
var CMD_TYPE_LOGIN = 'LOGIN';
var CMD_TYPE_LOGOUT = 'LOGOUT';
var CMD_TYPE_COOKIE_UPDATE = 'COOKIE_UPDATE';
var LANG_EN = 'LANG_EN';
var LANG_TC = 'LANG_TC';
var PAGING_BLOG_ID = 'blog_id';
var PAGING_PAGE_NO = 'page_no';
var PAGING_CREATED_BY = 'created_by';
var PAGING_IS_ESCAPE_PAGING = 'is_escape_paging';
var PAGING_MENU_ID = 'menu_id';
var PAGING_LANG = 'lang';
var lang = '';
var defaultLang = '';
// JavaScript Document
$(document).ready(function(){ 
	changeBackgroundByRandom();
	prepareUserSessionStuffs();
	prepareEnvVars();
}); // end $(document).ready

function prepareEnvVars(){
	getLang();
	getDefaultLang();
	if (lang == ''){
		lang = defaultLang;
	}
}
function getLang(){
	var langInput = $('.lang');
	if (langInput.length > 0){
		$(langInput).each(function(i, obj) {
			if (!isUndefinedOrIsNull($(this).val())){
				lang = $(this).val();
			}
		});
	}
}
function getDefaultLang(){
	var defaultLangInput = $('.defaultLang');
	if (defaultLangInput.length > 0){
		defaultLang = $(defaultLangInput).val();
	}
}
function getBundle_NoRecordFound(){
	var message = '';
	var noRecordFoundTc = $('.noRecordFoundTc').val();
	var noRecordFoundEn = $('.noRecordFoundEn').val();
	if (lang == LANG_TC){
		noRecordFound = noRecordFoundTc
	} else if (lang == LANG_EN){
		noRecordFound = noRecordFoundEn
	} 
	
	if (noRecordFound === null){
		if (defaultLang == LANG_TC){
			noRecordFound = noRecordFoundTc
		} else if (defaultLang == LANG_EN){
			noRecordFound = noRecordFoundEn
		} 
	}
	message = noRecordFound;
	return message;
}
function prepareUserSessionStuffs(){
	$('userNameInput').click(function(event) {
	    event.preventDefault();
	});
}
function changeBackgroundByRandom(){
	if ($('.backgroundinput').length){
		var backgroundInput = $('.backgroundinput');
		var fileName = $(backgroundInput).val();	
		if ($('.background').length){
			$('.background').css('background-image', 'url(' + fileName + ')');
		}
	}
}

function prepareFacebookButton(){
	$('._2tga:hover').css('background', '#365899');
	$('._2tga').css('background', '#224a36');
	$('._2tga').css('border', '1px solid #4267b2');
}

function createVo(){
	var vo = {};
	vo.command = CMD_TYPE_NONE;
	vo.voId = getDateString_YYYYMMDD_HHMMSS_MiSec(); // common_utils.js
	vo.dataClassName = '';
	vo.dataInstance = {};
	vo.isSaved = false;
	return vo;
}

function createUserVo(){
	var userVo = {};
	userVo.userName = '';
	userVo.password = '';
	return userVo;
}
function createCookieVo(){
	var cookieVo = {};
	cookieVo.currentSelectedLang = LANG_TC;
	return cookieVo;
}
function username_click(e){
	
}
function logout_click(e){
	var userVo = collectLogoutUserVoData();
	postUserLogout(userVo);
}
function collectLogoutUserVoData(){
	var userVo = createUserVo();
	userVo.userName = $('.userNameInput').val();
	return userVo;
}
function collectUserVoData(){
	var userVo = createUserVo();
	userVo.userName = $('.loginInput').val();
	var password = $('.passwordInput').val();
	var hashPassword = md5(password);
	userVo.password = hashPassword;
	return userVo;
}
function postUserLogout(userVo){
	var vo = createVo();
	vo.command = CMD_TYPE_LOGOUT;
	vo.dataClassName = 'UserVo';
	vo.dataInstance = userVo;
	var dataString = JSON.stringify(vo);
	dataString = '{' + '"vo": ' + dataString + '}';
	console.log(dataString);
	//dataString = '{' +'"cmdObjectDto": ' + dataString + '}';

	$.post('../../../rabbitforever/commands/LoginPageCommand.php', { data: dataString }, userLogoutCallBack, "text");
}

function userLogoutCallBack(jsonStr){
	var loginPageVo = JSON.parse(jsonStr);
	if(isUndefinedOrIsNull(loginPageVo) || isUndefinedOrIsNull(loginPageVo.userVo) || isUndefinedOrIsNull(loginPageVo.userVo.isLogoff)){
		alert('Abnormal nullable data return');
		return;
	}
	if (loginPageVo.userVo.isLogoff){
		alert('Logout successfully!');
		var userVo = loginPageVo.userVo;
		if (!isUndefinedOrIsNull(userVo)){
			var userFullNameEn = userVo.userFullNameEn;
			var userName = userVo.userName;
			if($('.usersessiondiv').length){
				$('.usersessiondiv').remove();
			}
			
		}
		window.location.href = "login_page.php";
	} else {
		alert('Logout failed!');
	}
}

function getBundleLangByLabel(labelName){
	var inputHidden = null;
	var labelValue = '';
	if (isUndefinedOrIsNull(lang) || lang == ''){
		getLang();
	}
	
	if (lang == LANG_EN){
		eval('inputHidden = $(".' + labelName +'En");');
		
	} else if (lang == LANG_TC){
		eval('inputHidden = $(".' + labelName +'Tc");');
	}

	if (!isUndefinedOrIsNull(inputHidden) && inputHidden.length > 0){
		labelValue = $(inputHidden).val();
	}
	return labelValue;
}