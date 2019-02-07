/**
 * 
 */
function languageselect_onchange(e){
	var controlObj = e.target;
	reloadLanguageSelectChange();
}
function saveLangCookie(){
	var cookieVo = createCookieVo();
	var languageSelect = $('.languageselect');
	if (languageSelect.length > 0){
		var currentSelectedLang = $(languageSelect).val();
		cookieVo.currentSelectedLang = currentSelectedLang;
		postUpdateLangCookieBlogPageVo(cookieVo);
	}
}
function postUpdateLangCookieBlogPageVo(cookieVo) {
	// var data = JSON.stringify(_userObj, null, 2);
	var vo = createVo();
	if (blogVo.id == -1) {
		vo.command = CMD_TYPE_COOKIE_UPDATE;
	}
	vo.dataClassName = 'CookieVo';
	vo.dataInstance = cookieVo;
	var dataString = JSON.stringify(vo);
	dataString = '{' + '"vo": ' + dataString + '}';
	console.log(dataString);
	// dataString = '{' +'"cmdObjectDto": ' + dataString + '}';

	$.ajax({
		type : "POST",
		url : "../../../rabbitforever/commands/CookieCommand.php",
		data : {
			data : dataString
		}
	}).done(function(data, status, jqXHR) {
		updateLangCookieBlogPageVoCallBack(data);
//		alert("Promise success callback.");
	}).fail(function(jqXHR, status, err) {
		alert("Promise error callback.");
	}).always(function() {
//		alert("Promise completion callback.");
	})

	// $.post('../../../rabbitforever/commands/BlogPageCommand.php', { data:
	// dataString }, selectBlogPageVoCallBack, "text");

}
function updateLangCookieBlogPageVoCallBack(jsonStr){
	var blogPageVo = JSON.parse(jsonStr);
	reloadLanguageSelectChange();
}
function reloadLanguageSelectChange(){

	
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
		}
	}
	var selectedLanguage = $('.languageselect').val();
	if (lang.length > 0){
		if (count > 0){
			uri += '&';
		} else {
			uri += '?';
		}
		uri += PAGING_LANG + '=' + selectedLanguage; 
		count++;
	} else {
		if (count > 0){
			uri += '&';
		} else {
			uri += '?';
		}
		uri += PAGING_LANG + '=' + selectedLanguage;
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