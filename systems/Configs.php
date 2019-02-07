<?php
// lv 1
defined ( 'ABSOLUTE_ROOT_PATH' ) or define ( 'ABSOLUTE_ROOT_PATH', getWebRootAbsolutePath ( 'rabbitforever' ) );
defined ( 'FRAMEWORK_PATH' ) or define ( 'FRAMEWORK_PATH', ABSOLUTE_ROOT_PATH . '/framework' );
defined ( 'LIBRARIES_PATH' ) or define ( 'LIBRARIES_PATH', ABSOLUTE_ROOT_PATH . '/libraries' );
defined ( 'COMMON_PATH' ) or define ( 'COMMON_PATH', ABSOLUTE_ROOT_PATH . '/common' );
defined ( 'BUNDLES_PATH' ) or define ( 'BUNDLES_PATH', ABSOLUTE_ROOT_PATH . '/bundles' );
defined ( 'VIEWS_PATH' ) or define ( 'VIEWS_PATH', ABSOLUTE_ROOT_PATH . '/views' );
defined ( 'FACTORIES_PATH' ) or define ( 'FACTORIES_PATH', ABSOLUTE_ROOT_PATH . '/factories' );
defined ( 'BUILDERS_PATH' ) or define ( 'BUILDERS_PATH', ABSOLUTE_ROOT_PATH . '/builders' );
defined ( 'UTILS_PATH' ) or define ( 'UTILS_PATH', ABSOLUTE_ROOT_PATH . '/utils' );
defined ( 'COMMANDERS_PATH' ) or define ( 'COMMANDERS_PATH', ABSOLUTE_ROOT_PATH . '/commanders' );
defined ( 'CONTROLS_PATH' ) or define ('CONTROLS_PATH', ABSOLUTE_ROOT_PATH . '/controls' );
defined ( 'CONTROLLERS_PATH' ) or define ( 'CONTROLLERS_PATH', ABSOLUTE_ROOT_PATH . '/controllers' );
defined ( 'MODELS_PATH' ) or define ( 'MODELS_PATH', ABSOLUTE_ROOT_PATH . '/models' );
defined ( 'DAOS_PATH' ) or define ( 'DAOS_PATH', ABSOLUTE_ROOT_PATH . '/daos' );
defined ( 'SERVICES_PATH' ) or define ( 'SERVICES_PATH', ABSOLUTE_ROOT_PATH . '/services' );
defined ( 'HELPERS_PATH' ) or define ( 'HELPERS_PATH', ABSOLUTE_ROOT_PATH . '/helpers' );
// lv 2
defined ( 'VOS_PATH' ) or define ( 'VOS_PATH', MODELS_PATH . '/vos' );
defined ( 'DTOS_PATH' ) or define ( 'DTOS_PATH', MODELS_PATH . '/dtos' );
defined ( 'EOS_PATH' ) or define ( 'EOS_PATH', MODELS_PATH . '/eos' );
defined ( 'SOS_PATH' ) or define ( 'SOS_PATH', MODELS_PATH . '/sos' );

defined ( 'PAGES_PATH' ) or define ( 'PAGES_PATH', VIEWS_PATH . '/pages' );
defined ( 'CSS_PATH' ) or define ( 'CSS_PATH', VIEWS_PATH . '/styles' );
defined ( 'JAVASCRIPTS_PATH' ) or define ( 'JAVASCRIPTS_PATH', VIEWS_PATH . '/javascripts' );
defined ( 'IMAGES_PATH' ) or define ( 'IMAGES_PATH', VIEWS_PATH . '/images' );
defined ( 'IMAGES_BUTTONS_PATH') or define ('IMAGES_BUTTONS_PATH', IMAGES_PATH . '/buttons' );
defined ( 'IMAGES_BACKGROUNDS_PATH' ) or define ( 'IMAGES_BACKGROUNDS_PATH', IMAGES_PATH . '/backgrounds' );
defined ( 'BLOGS_IMAGES_UPLOADS_PATH' ) or define ( 'BLOGS_IMAGES_UPLOADS_PATH', IMAGES_PATH . '/uploads/blogs' );
defined ( 'MOVIES_IMAGES_UPLOADS_PATH' ) or define ( 'MOVIES_IMAGES_UPLOADS_PATH', IMAGES_PATH . '/uploads/movies' );
defined ( 'LOG4PHP_PATH' ) or define ( 'LOG4PHP_PATH', LIBRARIES_PATH . '/log4php' );
defined ( 'LOG4PHP_CONFIG_FILE' ) or define ( 'LOG4PHP_CONFIG_FILE', LOG4PHP_PATH . '/config.xml' );

function getWebRootAbsolutePath($rootName) {
	$currentDir = getcwd ();
	// echo 'current dir:' . $currentDir . '<br/>';
	$findRootDirPos = strpos ( $currentDir, $rootName, 0 );
	$rootDir = substr_replace ( $currentDir, '', $findRootDirPos + strlen ( $rootName ) );
	$rootDir = str_replace ( "\\", "/", $rootDir );
	$rootDir = preg_replace ( "/[A-Za-z]{1}\:/", "", $rootDir );
// 	echo 'rootdir: ' . $rootDir . '<br/>';
	return $rootDir;
}

// html web root - /rabbitforever
defined ( 'HTML_WEB_ROOT' ) or define ( 'HTML_WEB_ROOT', '/rabbitforever' );

defined ( 'HTML_VIEWS_PATH' ) or define ( 'HTML_VIEWS_PATH', HTML_WEB_ROOT . '/views' );
defined ( 'HTML_PAGES_PATH' ) or define ( 'HTML_PAGES_PATH', HTML_VIEWS_PATH . '/pages' );
defined ( 'HTML_JAVASCRIPTS_PATH' ) or define ( 'HTML_JAVASCRIPTS_PATH', HTML_VIEWS_PATH . '/javascripts' );
defined ( 'HTML_JAVASCRIPTS_CKEDITOR_PATH' ) or define ( 'HTML_JAVASCRIPTS_CKEDITOR_PATH', HTML_JAVASCRIPTS_PATH . '/ckeditor' );
defined ( 'HTML_CSS_PATH' ) or define ( 'HTML_CSS_PATH', HTML_VIEWS_PATH . '/styles' );
defined ( 'HTML_IMAGES_PATH' ) or define ( 'HTML_IMAGES_PATH', HTML_VIEWS_PATH . '/images' );

defined ( 'HTML_IMAGES_BUTTONS_PATH') or define ( 'HTML_IMAGES_BUTTONS_PATH', HTML_IMAGES_PATH. '/buttons' );
defined ( 'HTML_IMAGES_BACKGROUNDS_PATH' ) or define ( 'HTML_IMAGES_BACKGROUNDS_PATH', HTML_IMAGES_PATH. '/backgrounds' );
defined ( 'HTML_BLOGS_IMAGES_UPLOADS_PATH' ) or define ( 'HTML_BLOGS_IMAGES_UPLOADS_PATH', HTML_IMAGES_PATH . '/uploads/blogs' );
defined ( 'HTML_MOVIES_IMAGES_UPLOADS_PATH' ) or define ( 'HTML_MOVIES_IMAGES_UPLOADS_PATH', HTML_IMAGES_PATH . '/uploads/movies' );

defined ( 'HTML_SUPERFISH_DIST_PATH' ) or define ('HTML_SUPERFISH_DIST_PATH', HTML_JAVASCRIPTS_PATH .'/superfish-master/dist');
defined ( 'HTML_SUPERFISH_DIST_CSS_PATH' ) or define ('HTML_SUPERFISH_DIST_CSS_PATH', HTML_SUPERFISH_DIST_PATH .'/css');
defined ( 'HTML_SUPERFISH_DIST_JS_PATH' ) or define ('HTML_SUPERFISH_DIST_JS_PATH', HTML_SUPERFISH_DIST_PATH .'/js');
defined ( 'HTML_MD5_PATH' ) or define ('HTML_MD5_PATH', HTML_JAVASCRIPTS_PATH .'/md5/js');
defined ( 'HTML_JQUERY_UI_PATH' ) or define ('HTML_JQUERY_UI_PATH', HTML_JAVASCRIPTS_PATH .'/jqueryUI');
defined ( 'HTML_CK_EDITOR_PATH' ) or define ('HTML_CK_EDITOR_PATH', HTML_JAVASCRIPTS_PATH .'/ckeditor');
defined ( 'HTML_NIC_EDITOR_PATH' ) or define ('HTML_NIC_EDITOR_PATH', HTML_JAVASCRIPTS_PATH .'/niceditor');
defined ( 'HTML_TINYMCE_PATH' ) or define ('HTML_TINYMCE_PATH', HTML_JAVASCRIPTS_PATH .'/tinymce');
defined ( 'HTML_VALIDATION_ENGINE_PATH' ) or define ('HTML_VALIDATION_ENGINE_PATH', HTML_JAVASCRIPTS_PATH .'/validation-engine');
defined ( 'HTML_VALIDATION_ENGINE_JS_PATH' ) or define ('HTML_VALIDATION_ENGINE_JS_PATH', HTML_VALIDATION_ENGINE_PATH .'/js');
defined ( 'HTML_VALIDATION_ENGINE_CSS_PATH' ) or define ('HTML_VALIDATION_ENGINE_CSS_PATH', HTML_VALIDATION_ENGINE_PATH .'/css');

function getPath($path) {
	print $path;
}
?>