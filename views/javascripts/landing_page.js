/**
 * landing_pages
 */
var windowsWidth;
var windowsHeight;
function getWindowsResolution(){
	windowsWidth = window.screen.availWidth;
	windowsHeight = window.screen.availHeight;
	
	windowsWidth = windowsWidth * 0.85;
	windowsHeight = windowsHeight * 0.85;
	$('.background').css('width', windowsWidth);
	$('.background').css('height', windowsHeight);
}
$(document).ready(function(){ 
	getWindowsResolution();
	checkQueryString();
}); // end $(document).ready

function checkQueryString(){
	var isEscapePaging = getUrlParam(PAGING_IS_ESCAPE_PAGING);
	var lang = getUrlParam(PAGING_LANG);
	
	if (isEscapePaging.length == 0){
		if (lang.length == 0){
			reloadQueryStringPage();
		}
	} else {
		if (isEscapePaging != 1){
			if (lang.length == 0){
				reloadQueryStringPage();
			}
		}
	}
	
	if (lang.length == 0){
		reloadQueryStringPage();
	}
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

