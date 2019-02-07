<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (CONTROLLERS_PATH . '/MovieWaitingController.php');
include_once( CONTROLS_PATH . '/MovieControl.php');
include_once( CONTROLS_PATH . '/MovieFileUploadControl.php');
include_once( CONTROLS_PATH . '/MovieLookupControl.php');
include_once (VOS_PATH . '/UserSessionVo.php');
include_once (VOS_PATH . '/UserVo.php');
if (session_status () == PHP_SESSION_NONE) {
	session_start ();
}
$movieWaitingController = new MovieWaitingController ();
$userSessionVo = $movieWaitingController->getUserSessionVo ();
$movieControl = new MovieControl();
$movieFileUploadControl = new MovieFileUploadControl();
$movieLookupControl = new MovieLookupControl();
$commonPageBundlesEo = $movieWaitingController->getCommonPageBundlesEo();
$movieWaitingPageBundlesEo = $movieWaitingController->getMovieWaitingPageBundlesEo();

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
	<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/movie_waiting_page.js"></script>
	<script type="text/javascript" src="<?php echo HTML_SUPERFISH_DIST_JS_PATH ?>/superfish.js"></script>
	<script type="text/javascript" src="<?php echo HTML_SUPERFISH_DIST_JS_PATH ?>/hoverIntent.js"></script>



	<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/lang_select_control.js"></script>
	<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/movie_control.js"></script>
	<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/movies_fileupload_control.js"></script>
	<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/movie_lookup_control.js"></script>
	<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/movie_class_control.js"></script>
	<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH?>/movie_type_control.js"></script>



	<link href="<?php echo HTML_CSS_PATH ?>/common.css" rel="stylesheet" type="text/css">
	<link href="<?php echo HTML_SUPERFISH_DIST_CSS_PATH ?>/superfish.css" rel="stylesheet" type="text/css">
	<link href="<?php echo HTML_CSS_PATH ?>/landing_page.css" rel="stylesheet" type="text/css">
	<link href="<?php echo HTML_JQUERY_UI_PATH ?>/jquery-ui.css" rel="stylesheet" type="text/css">
	<link href="<?php echo HTML_CSS_PATH ?>/lang_select_control.css" rel="stylesheet" type="text/css">
	<link href="<?php echo HTML_CSS_PATH ?>/movie_waiting_page.css" rel="stylesheet" type="text/css">
	<link href="<?php echo HTML_CSS_PATH ?>/movie_control.css" rel="stylesheet" type="text/css">
	<link href="<?php echo HTML_CSS_PATH ?>/fileupload_control.css" rel="stylesheet" type="text/css">
	<link href="<?php echo HTML_CSS_PATH ?>/movie_control.css" rel="stylesheet" type="text/css">
	<link href="<?php echo HTML_CSS_PATH ?>/fileupload_control.css" rel="stylesheet" type="text/css">
	<link href="<?php echo HTML_CSS_PATH ?>/movie_class_control.css" rel="stylesheet" type="text/css">
	<link href="<?php echo HTML_CSS_PATH ?>/movie_type_control.css" rel="stylesheet" type="text/css">
	<link href="<?php echo HTML_CSS_PATH ?>/movie_lookup_control.css" rel="stylesheet" type="text/css">	
	

	
</head>

<body class="background">
	<?php $movieWaitingController->renderBundleJs(); ?>
	<div class="menu">
		<div class="superfishdiv">
		<?php
		$movieWaitingController->renderCmnMenu();
		?>
		<?php
		$movieWaitingController->renderLangSelectControl();
		$movieWaitingController->renderUserSession();
		$movieWaitingController->renderBackgroundFileName();
		$movieWaitingController->renderHiddenSystemParams();
		?>
	</div>
	</div>
	<div class="main rounded scrollbar">
		<br />
		<br />
		<div class="moviewaitingdiv">
		<?php
		$movieWaitingController->renderMovieWaitingControl();
		?>
		</div>
		<div class="movieDetailsDiv">
			<?php
			$movieWaitingController->renderMovieControl();
			$movieWaitingController->renderMovieFileUploadControl();
			?>
		</div>

		<div class="movieLookupDiv">
			<?php
			$movieLookupControl->render();
			?>
		</div>
	</div>

	<div class="movieWaitingSaveConfirmationDiv" title="<?php echo $commonPageBundlesEo->getDataSaveConfirmation(); ?>">
		<p>
			<span class="ui-icon ui-icon-alert" style="float: left; margin: 12px 12px 20px 0;"></span>
			<span class="messageSpan"><?php echo $commonPageBundlesEo->getAreYouSure() ?></span>
		</p>
	</div>
</body>
</html>