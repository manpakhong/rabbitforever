<?php
	include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
	include_once( LOG4PHP_PATH . '/RabbitLogger.php');
	include_once( CONTROLLERS_PATH . '/BlogController.php');
	include_once( VOS_PATH . '/UserSessionVo.php');
	include_once (VOS_PATH . '/UserVo.php');
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	$blogController = new BlogController();
	$userSessionVo = $blogController->getUserSessionVo();
?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>rabbitforever.com</title>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/jquery-2.1.4.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo HTML_JQUERY_UI_PATH ?>/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/common.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/common_utils.js"></script>

<script type="text/javascript" src="<?php echo HTML_SUPERFISH_DIST_JS_PATH ?>/superfish.js"></script>
<script type="text/javascript" src="<?php echo HTML_SUPERFISH_DIST_JS_PATH ?>/hoverIntent.js"></script>
<script type="text/javascript" src="<?php echo HTML_NIC_EDITOR_PATH ?>/nicEdit.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/nicedit_test.js"></script>
<link href="<?php echo HTML_CSS_PATH ?>/common.css" rel="stylesheet" type="text/css">
<link href="<?php echo HTML_SUPERFISH_DIST_CSS_PATH ?>/superfish.css" rel="stylesheet" type="text/css">
<link href="<?php echo HTML_CSS_PATH ?>/blog_page.css" rel="stylesheet" type="text/css">
<link href="<?php echo HTML_JQUERY_UI_PATH ?>/jquery-ui.css" rel="stylesheet" type="text/css">
<link href="<?php echo HTML_CSS_PATH ?>/fileupload_control.css" rel="stylesheet" type="text/css">
</head>
<body>
	<textarea name="blogEditor" id="blogEditor" class="blogEditorTextAreaModal" rows="10" cols="80"></textarea>
	<br/>
	<input type="button" value="Test" onclick="test_onclick(event);" />
</body>
</html>