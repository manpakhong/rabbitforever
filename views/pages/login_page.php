
<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLLERS_PATH . '/LoginController.php');
include_once( VOS_PATH . '/UserSessionVo.php');
include_once (VOS_PATH . '/UserVo.php');

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$loginController = new LoginController();
$userSessionVo = $loginController->getUserSessionVo();
?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>rabbitforever.com</title>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/jquery-2.1.4.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/json3.min.js"></script>
<script type="text/javascript" src="<?php echo HTML_MD5_PATH ?>/md5.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/common.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/common_utils.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/login_page.js"></script>
<script type="text/javascript" src="<?php echo HTML_SUPERFISH_DIST_JS_PATH ?>/superfish.js"></script>
<script type="text/javascript" src="<?php echo HTML_SUPERFISH_DIST_JS_PATH ?>/hoverIntent.js"></script>
<link href="<?php echo HTML_CSS_PATH ?>/common.css" rel="stylesheet" type="text/css">
<link href="<?php echo HTML_SUPERFISH_DIST_CSS_PATH ?>/superfish.css" rel="stylesheet" type="text/css">
<link href="<?php echo HTML_CSS_PATH ?>/login_page.css" rel="stylesheet" type="text/css">
</head>

<body class="background">
<div class="menu">
	<div class="superfishdiv">
		<?php 
			$loginController->renderCmnMenu();
		?>
	</div>
		<?php 
			$loginController->renderUserSession(); 
			$loginController->renderBackgroundFileName();
		?>
		
</div>
<div class="main rounded">
	<div class="loginlegenddiv">
		<form class="loginform">
			<fieldset>
				<legend><span class="legendspan">Writer Login:</span></legend>
				<table>
					<tr>
						<td>Login:</td>
						<td>
							<input class="loginInput" type="text"></input>
						</td>
					</tr>
					<tr>
						<td>Password:</td>
						<td>
							<input class="passwordInput" type="password"></input>
						</td>
					</tr>
					<tr>
						<td><input type="button" value="Submit" onclick="submit_click();"></input></td>
						<td></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>

</div>

</body>
</html>