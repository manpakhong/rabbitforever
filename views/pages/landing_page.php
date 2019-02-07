<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLLERS_PATH . '/LandingPageController.php');
include_once( VOS_PATH . '/UserSessionVo.php');
include_once (VOS_PATH . '/UserVo.php');
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$landingPageController = new LandingPageController();
$userSessionVo = $landingPageController->getUserSessionVo();
?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>rabbitforever.com</title>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/jquery-3.1.1.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo HTML_JQUERY_UI_PATH ?>/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/common.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/common_utils.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/landing_page.js"></script>
<script type="text/javascript" src="<?php echo HTML_SUPERFISH_DIST_JS_PATH ?>/superfish.js"></script>
<script type="text/javascript" src="<?php echo HTML_SUPERFISH_DIST_JS_PATH ?>/hoverIntent.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/lang_select_control.js"></script>
<link href="<?php echo HTML_CSS_PATH ?>/common.css" rel="stylesheet" type="text/css">
<link href="<?php echo HTML_SUPERFISH_DIST_CSS_PATH ?>/superfish.css" rel="stylesheet" type="text/css">
<link href="<?php echo HTML_CSS_PATH ?>/landing_page.css" rel="stylesheet" type="text/css">
<link href="<?php echo HTML_JQUERY_UI_PATH ?>/jquery-ui.css" rel="stylesheet" type="text/css">
<link href="<?php echo HTML_CSS_PATH ?>/lang_select_control.css" rel="stylesheet" type="text/css">

</head>

<body class="background">
<div class="menu">
	<div class="superfishdiv">
		<?php 
		$landingPageController->renderCmnMenu();
		?>
		<?php 
		$landingPageController->renderLangSelectControl();
		$landingPageController->renderUserSession();
		$landingPageController->renderBackgroundFileName();
		$landingPageController->renderHiddenSystemParams();
		?>
	</div>
</div>
<div class="main rounded scrollbar">
	<br/> <br/>
	<div class="allrecentwritingdiv recentupdatediv">
	<?php 
		$landingPageController->renderRecentUpdated();
	?>
	</div>
	<div class="recentwritingbytopic1div recentupdatediv">
		<?php 
		$landingPageController->renderRandomRecentUpdated();
		?>
	</div>
	<div class="recentwritingbytopic2div recentupdatediv">
		<?php
		$landingPageController->renderRandomRecentUpdated();
		?>
	</div>
</div>
</body>
</html>