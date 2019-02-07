<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');

if (session_status () == PHP_SESSION_NONE) {
	session_start ();
}


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
	<script type="text/javascript" src="<?php echo HTML_SUPERFISH_DIST_JS_PATH ?>/superfish.js"></script>
	<script type="text/javascript" src="<?php echo HTML_SUPERFISH_DIST_JS_PATH ?>/hoverIntent.js"></script>
	<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/lang_select_control.js"></script>
	<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/google_map_page.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5x1Y118hX9WTssfAIsA7y8OX4CudIrWQ&callback=myMap"></script>
	<link href="<?php echo HTML_CSS_PATH ?>/common.css" rel="stylesheet" type="text/css">
	<link href="<?php echo HTML_SUPERFISH_DIST_CSS_PATH ?>/superfish.css" rel="stylesheet" type="text/css">
	<link href="<?php echo HTML_CSS_PATH ?>/landing_page.css" rel="stylesheet" type="text/css">
	<link href="<?php echo HTML_JQUERY_UI_PATH ?>/jquery-ui.css" rel="stylesheet" type="text/css">
	<link href="<?php echo HTML_CSS_PATH ?>/lang_select_control.css" rel="stylesheet" type="text/css">
	<link href="<?php echo HTML_CSS_PATH ?>/google_map_page.css" rel="stylesheet" type="text/css">

	

	
</head>

<body class="background">
	<div id="googleMap" style="width:100%;height:800px;"></div>
</body>
</html>