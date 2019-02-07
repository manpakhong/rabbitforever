
// JavaScript Document
$(document).ready(function(){ 
}); // end $(document).ready


function postUserLogin(userVo){
	//var data = JSON.stringify(_userObj, null, 2);
	var vo = createVo();
	vo.command = CMD_TYPE_LOGIN;
	vo.dataClassName = 'UserVo';
	vo.dataInstance = userVo;
	var dataString = JSON.stringify(vo);
	dataString = '{' + '"vo": ' + dataString + '}';
	console.log(dataString);
	//dataString = '{' +'"cmdObjectDto": ' + dataString + '}';

	$.post('../../../rabbitforever/commands/LoginPageCommand.php', { data: dataString }, loginCallBack, "text");
}
function loginCallBack(jsonStr){
	var loginPageVo = JSON.parse(jsonStr);
	if(isUndefinedOrIsNull(loginPageVo) || isUndefinedOrIsNull(loginPageVo.isAuthenticated)){
		alert('Abnormal nullable data return');
		return;
	}
	if (loginPageVo.isAuthenticated){
		alert('Login successfully!');
		var userVo = loginPageVo.userVo;
		if (!isUndefinedOrIsNull(userVo)){
			var userFullNameEn = userVo.userFullNameEn;
			var userName = userVo.userName;
			if($('.usersessiondiv').length){
				$('.usersessiondiv').remove();
			}
			
			if (!$('.usersessiondiv').length){
				var htmlstring =
				'<div class="usersessiondiv">' +
				'<ul class="usersessionul">' +
				'<li class="usersessionli">' +
				'<a href="#" class="usersessionahref" onclick="username_click(event)">' +
				userFullNameEn +
				'</a>' + 
				'<input type="hidden" class="userNameInput" value="' + userName + '" />' +
				'</li>' +
				'<li class="usersessionli">' +
				'<a href="#" class="usersessionahref" onclick="logout_click(event)">' +
				'Logout' +
				'</a>' +
				'</li>' +
				'</ul>' +
				'</div>';
				$('.superfishdiv').append(htmlstring);
			}
		}
//		// similar behavior as an HTTP redirect
//		window.location.replace("http://stackoverflow.com");

		// similar behavior as clicking on a link
		window.location.href = "control_page.php?menu_id=1&page_no=1";
	} else {
		alert('User Name/ password is/ are mismatched!');
	}

}
function submit_click(){

	var userVo = collectUserVoData();
	postUserLogin(userVo);
}