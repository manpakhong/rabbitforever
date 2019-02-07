<?php session_start(); ?>
<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLS_PATH . '/CmnMenuControl.php');
$cmnMenuControl = new CmnMenuControl();
?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>rabbitforever.com</title>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/jquery-2.1.4.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/common.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/blog_page.js"></script>
<script type="text/javascript" src="<?php echo HTML_SUPERFISH_DIST_JS_PATH ?>/superfish.js"></script>
<script type="text/javascript" src="<?php echo HTML_SUPERFISH_DIST_JS_PATH ?>/hoverIntent.js"></script>
<link href="<?php echo HTML_CSS_PATH ?>/common.css" rel="stylesheet" type="text/css">
<link href="<?php echo HTML_SUPERFISH_DIST_CSS_PATH ?>/superfish.css" rel="stylesheet" type="text/css">
</head>

<body class="background">
<div class="menu">
	<div class="superfishdiv">
		<?php 
			$cmnMenuControl->render();
		?>
	</div>
</div>
<div class="main rounded opacity">

</div>
</body>
</html>