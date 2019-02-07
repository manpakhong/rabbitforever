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
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/jquery-3.1.1.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo HTML_JQUERY_UI_PATH ?>/jquery-ui.js"></script>

<script type="text/javascript" src="<?php echo HTML_TINYMCE_PATH ?>/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/common.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/common_utils.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/blog_page.js"></script>
<script type="text/javascript" src="<?php echo HTML_SUPERFISH_DIST_JS_PATH ?>/superfish.js"></script>
<script type="text/javascript" src="<?php echo HTML_SUPERFISH_DIST_JS_PATH ?>/hoverIntent.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/fileupload_control.js"></script>
<script type="text/javascript" src="<?php echo HTML_JAVASCRIPTS_PATH ?>/lang_select_control.js"></script>
<script type="text/javascript" src="<?php echo HTML_CK_EDITOR_PATH ?>/ckeditor.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<link href="<?php echo HTML_CSS_PATH ?>/common.css" rel="stylesheet" type="text/css">
<link href="<?php echo HTML_SUPERFISH_DIST_CSS_PATH ?>/superfish.css" rel="stylesheet" type="text/css">
<link href="<?php echo HTML_CSS_PATH ?>/blog_page.css" rel="stylesheet" type="text/css">
<link href="<?php echo HTML_JQUERY_UI_PATH ?>/jquery-ui.css" rel="stylesheet" type="text/css">
<link href="<?php echo HTML_CSS_PATH ?>/fileupload_control.css" rel="stylesheet" type="text/css">
<link href="<?php echo HTML_CSS_PATH ?>/lang_select_control.css" rel="stylesheet" type="text/css">
<?php 
$commonPageBundlesEo = $blogController->getCommonPageBundlesEo(); 
$blogPageBundlesEo = $blogController->getBlogPageBundlesEo();
?>

</head>

<body class="background">
<?php $blogController->renderBundleJs(); ?>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="menu">
	<div class="superfishdiv">
		<?php 
			$blogController->renderCmnMenu();
		?>
	</div>

	<?php 
		$blogController->renderLangSelectControl();
		$blogController->renderUserSession(); 
		$blogController->renderBackgroundFileName();
		$blogController->renderHiddenSystemParams();
	?>


</div>
<div class="addiconbuttondiv">
	<?php $blogController->renderAddBlogButton(); ?>
</div>
<div class="main rounded scrollbar">

	<div class="blogtablediv">
		<?php 
			$blogController->renderBlogs();
		?>
	</div>

</div>
<div class="deleteconfirmationdiv" title="Deletion confirmation?">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span><span class="messageSpan"><?php echo $commonPageBundlesEo->getAreYouSure() ?></span></p>
</div>
<div class="blogdialogdiv" title="<?php echo $blogPageBundlesEo->getEdit(); ?>">
  <form class="blogeditform">
  	<fieldset class="blogfieldset">
	  	<table class="blogedittable" tabIndex="1">
	  		<tbody>
		  		<tr>
		  			<td>
		  				<?php echo $blogPageBundlesEo->getDate(); ?>:
		  			</td>
		  			<td>
		  				<input type="hidden" value="" class="blogIdInputModal" />
		  				<input type="text" value="" class="blogDateInputModal" />
		  			</td>
		  		</tr>
		  		<tr>
		  			<td>
		  				<?php echo $blogPageBundlesEo->getSubject(); ?>:
		  			</td>
		  			<td>
		  				<input type="text" value="" class="blogSubjectInputModal blogSubjectInput" />
		  			</td>
		  		</tr>
		  		<tr style="display: none">
		  			<td>
		  				<input type="hidden" value="" class="blogContentInputModal" />
		  				<input type="hidden" value="" class="blogCreatedByInputModal" />
		  				<input type="hidden" value="" class="blogCreatedDateInputModal" />
		  			</td>
		  		</tr>
		  		<tr>
		  			<td>
		  				<?php echo $blogPageBundlesEo->getLanguage(); ?>:
		  			</td>
		  			<td>
		  				<?php $blogController->renderLanguageSelect(); ?>
		  				<input type="hidden" value="" class="blogLanguageCodeInputModal" />
		  			</td>
		  		</tr>
		  		<tr>
		  			<td>
		  				<?php echo $blogPageBundlesEo->getCategory(); ?>:
		  			</td>
		  			<td>
		  				<input type="text" value="" readonly  class="blogCategoryStringInputModal" onclick="doSelection(target);" />
		  				<input type="hidden" value="" class="blogCategoryIdInputModal" />
		  			</td>
		  		</tr>
<!-- 		  		<tr> -->
<!-- 		  			<td colspan="2"> -->

<!-- 		  			</td> -->
<!-- 		  		</tr> -->
			  	<tr>
			  		<td colspan="2">
						<textarea name="blogEditor" id="blogEditor" class="blogEditorTextAreaModal" rows="10" cols="80"></textarea>
			  		</td>
			  	</tr>
			  	<tr>
			  		<td>
			  			<?php echo $blogPageBundlesEo->getRemarks(); ?>:
			  		</td>
			  		<td>
			  			<textarea name="blogRemarks" class="blogRemarksTextAreaModal blogRemarksTextArea" rows="3" cols="40">
						</textarea>
			  		</td>
			  	</tr>
		  	</tbody>
	  	</table>
	</fieldset>
  </form>
  <?php $blogController->renderFileUpload(); ?>
</div>
<div class="cascadingcategoryselectiondiv" title="<?php echo $blogPageBundlesEo->getSelectACategory(); ?>">
	<input type="hidden" class="categoryIdSelectedInput" value="" />
	<input type="text" class="categorySelectedDisplayInput" value="" readonly />
	<div class="selectdiv">
		<?php echo $blogController->renderFirstLevelCategory(); ?>
	</div>
</div>
</body>
</html>