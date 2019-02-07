<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (UTILS_PATH . '/FileUtils.php');
include_once (UTILS_PATH . '/BundleUtils.php');
include_once (EOS_PATH . '/MySqlDbPropertiesEo.php');
include_once (EOS_PATH . '/SystemConfigEo.php');
include_once (BUILDERS_PATH . '/BundlesBuilder.php');
include_once (BUILDERS_PATH . '/SystemConfigBundlesBuilder.php');
include_once (BUILDERS_PATH . '/DbPropertiesBundlesBuilder.php');
include_once (BUILDERS_PATH . '/CommonPageBundlesBuilder.php');
include_once (BUILDERS_PATH . '/LoginPageBundlesBuilder.php');
include_once (BUILDERS_PATH . '/BlogPageBundlesBuilder.php');
include_once (BUILDERS_PATH . '/MovieWaitingPageBundlesBuilder.php');
include_once (BUILDERS_PATH . '/MovieLookupPageBundlesBuilder.php');
include_once (BUILDERS_PATH . '/MoviePageBundlesBuilder.php');
defined ('PROPERTIES_SYS_CONFIG_FILE_NAME') 
	or define('PROPERTIES_SYS_CONFIG_FILE_NAME', BUNDLES_PATH. '/system.config.properties');
defined ('PROPERTIES_PROD_FILE_NAME') 
	or define('PROPERTIES_PROD_FILE_NAME', BUNDLES_PATH. '/mysql.db.prod.properties');
defined ('PROPERTIES_DEV_FILE_NAME') 
	or define('PROPERTIES_DEV_FILE_NAME', BUNDLES_PATH. '/mysql.db.dev.properties');
defined ('PROPERTIES_COMMON_PAGE_FILE_NAME') 
	or define('PROPERTIES_COMMON_PAGE_FILE_NAME', BUNDLES_PATH. '/common_page.properties');
defined ('PROPERTIES_LOGIN_PAGE_FILE_NAME') 
	or define('PROPERTIES_LOGIN_PAGE_FILE_NAME', BUNDLES_PATH. '/login_page.properties');
defined ('PROPERTIES_BLOG_PAGE_FILE_NAME')
	or define('PROPERTIES_BLOG_PAGE_FILE_NAME', BUNDLES_PATH. '/blog_page.properties');
defined ('PROPERTIES_MOVIE_WAITING_PAGE_FILE_NAME')
	or define('PROPERTIES_MOVIE_WAITING_PAGE_FILE_NAME', BUNDLES_PATH. '/movie_waiting_page.properties');
defined ('PROPERTIES_MOVIE_PAGE_FILE_NAME')
	or define('PROPERTIES_MOVIE_PAGE_FILE_NAME', BUNDLES_PATH. '/movie_page.properties');
defined ('PROPERTIES_MOVIE_LOOKUP_PAGE_FILE_NAME')
	or define('PROPERTIES_MOVIE_LOOKUP_PAGE_FILE_NAME', BUNDLES_PATH. '/movie_lookup_page.properties');
class BundlesFactory {
	const PROPERTIES_SYS_CONFIG_FILE_NAME = PROPERTIES_SYS_CONFIG_FILE_NAME;
	const PROPERTIES_PROD_FILE_NAME = PROPERTIES_PROD_FILE_NAME;
	const PROPERTIES_DEV_FILE_NAME = PROPERTIES_DEV_FILE_NAME;
	const PROPERTIES_COMMON_PAGE_FILE_NAME = PROPERTIES_COMMON_PAGE_FILE_NAME;
	const PROPERTIES_LOGIN_PAGE_FILE_NAME = PROPERTIES_LOGIN_PAGE_FILE_NAME;
	const PROPERTIES_BLOG_PAGE_FILE_NAME = PROPERTIES_BLOG_PAGE_FILE_NAME;
	const PROPERTIES_MOVIE_WAITING_PAGE_FILE_NAME = PROPERTIES_MOVIE_WAITING_PAGE_FILE_NAME;
	const PROPERTIES_MOVIE_PAGE_FILE_NAME = PROPERTIES_MOVIE_PAGE_FILE_NAME;
	const PROPERTIES_MOVIE_LOOKUP_PAGE_FILE_NAME = PROPERTIES_MOVIE_LOOKUP_PAGE_FILE_NAME;
	private static $className;
	private $logger;
	
	private static $systemConfigEo;
	private static $dbPropertiesEo;
	
	private static $commonPageBundlesEo;
	private static $loginPageBundlesEo;
	private static $blogPageBundlesEo;
	private static $movieWaitingPageBundlesEo;
	private static $moviePageBundlesEo;
	private static $movieLookupPageBundlesEo;
	private static $bundlesFactory;

	
	private function __construct(){
		BundlesFactory::fillClassName();
	}
	public static function getInstance(){
		if (!isset(BundlesFactory::$bundlesFactory)){
			BundlesFactory::$bundlesFactory = new BundlesFactory();
			BundlesFactory::$systemConfigEo = BundlesFactory::$bundlesFactory->getInstanceOfSystemConfigEo();
		}
		return BundlesFactory::$bundlesFactory;
	}
	public function fillClassName() {
		if (!isset(BundlesFactory::$className)){
			BundlesFactory::$className =  __CLASS__;
		}
	}
	// -------------------------------------------------------------
	
	public function getInstanceOfMoviePageBundlesEo(){
		if(!isset(BundlesFactory::$moviePageBundlesEo)){
			$this->buildMoviePageBundlesEo();
		}
		return BundlesFactory::$moviePageBundlesEo;
	}
	
	private function buildMoviePageBundlesEo(){
		try {
			$builder = new MoviePageBundlesBuilder(PROPERTIES_MOVIE_PAGE_FILE_NAME);
			$builder->setSystemConfigEo(BundlesFactory::$systemConfigEo);
			$builder->buildBundle();
			$bundleEo = $builder->getBundleEo();
			BundlesFactory::$moviePageBundlesEo = $bundleEo;
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::$className . '->buildMoviePageBundlesEo() - ',$ex );
			throw $ex;
		}
	}
	public function getInstanceOfMovieLookupPageBundlesEo(){
		if(!isset(BundlesFactory::$movieLookupPageBundlesEo)){
			$this->buildMovieLookupPageBundlesEo();
		}
		return BundlesFactory::$movieLookupPageBundlesEo;
	}
	
	private function buildMovieLookupPageBundlesEo(){
		try {
			$builder = new MovieLookupPageBundlesBuilder(PROPERTIES_MOVIE_LOOKUP_PAGE_FILE_NAME);
			$builder->setSystemConfigEo(BundlesFactory::$systemConfigEo);
			$builder->buildBundle();
			$bundleEo = $builder->getBundleEo();
			BundlesFactory::$movieLookupPageBundlesEo = $bundleEo;
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::$className . '->buildMovieLookupPageBundlesEo() - ',$ex );
			throw $ex;
		}
	}
	
	
	
	public function getInstanceOfMovieWaitingPageBundlesEo(){
		if(!isset(BundlesFactory::$movieWaitingPageBundlesEo)){
			$this->buildMovieWaitingPageBundlesEo();
		}
		return BundlesFactory::$movieWaitingPageBundlesEo;
	}
	
	private function buildMovieWaitingPageBundlesEo(){
		try {
			$builder = new MovieWaitingPageBundlesBuilder(PROPERTIES_MOVIE_WAITING_PAGE_FILE_NAME);
			$builder->setSystemConfigEo(BundlesFactory::$systemConfigEo);
			$builder->buildBundle();
			$bundleEo = $builder->getBundleEo();
			BundlesFactory::$movieWaitingPageBundlesEo = $bundleEo;
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::$className . '->buildMovieWaitingPageBundlesEo() - ',$ex );
			throw $ex;
		}
	}
	
	public function getInstanceOfBlogPageBundlesEo(){
		if(!isset(BundlesFactory::$blogPageBundlesEo)){
			$this->buildBlogPageBundlesEo();
		}
		return BundlesFactory::$blogPageBundlesEo;
	}
	
	private function buildBlogPageBundlesEo(){
		try {
			$builder = new BlogPageBundlesBuilder(PROPERTIES_BLOG_PAGE_FILE_NAME);
			$builder->setSystemConfigEo(BundlesFactory::$systemConfigEo);
			$builder->buildBundle();
			$bundleEo = $builder->getBundleEo();
			BundlesFactory::$blogPageBundlesEo = $bundleEo;
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::$className . '->buildBlogPageBundlesEo() - ',$ex );
			throw $ex;
		}
	}
	public function getInstanceOfLoginPageBundlesEo(){
		if(!isset(BundlesFactory::$loginPageBundlesEo)){
			$this->buildLoginPageBundlesEo();
		}
		return BundlesFactory::$loginPageBundlesEo;
	}
	
	private function buildLoginPageBundlesEo(){
		try {
			$builder = new LoginPageBundlesBuilder(PROPERTIES_LOGIN_PAGE_FILE_NAME);
			$builder->setSystemConfigEo(BundlesFactory::$systemConfigEo);
			$builder->buildBundle();
			$bundleEo = $builder->getBundleEo();
			BundlesFactory::$loginPageBundlesEo = $bundleEo;
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::$className . '->buildLoginPageBundlesEo() - ',$ex );
			throw $ex;
		}
	}
	public function getInstanceOfCommonPageBundlesEo(){
		if(!isset(BundlesFactory::$commonPageBundlesEo)){
			$this->buildCommonPageBundlesEo();
		}
		return BundlesFactory::$commonPageBundlesEo;
	}
	
	private function buildCommonPageBundlesEo(){
		try {
			$builder = new CommonPageBundlesBuilder(PROPERTIES_COMMON_PAGE_FILE_NAME);
			$builder->setSystemConfigEo(BundlesFactory::$systemConfigEo);
			$builder->buildBundle();
			$bundleEo = $builder->getBundleEo();
			BundlesFactory::$commonPageBundlesEo = $bundleEo;
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::$className . '->buildCommonPageBundlesEo() - ',$ex );
			throw $ex;
		}
	}
	
	public function getInstanceOfSystemConfigEo(){
		if(!isset(BundlesFactory::$systemConfigEo)){
			$this->buildSystemConfigEo();
		}
		return BundlesFactory::$systemConfigEo;
	}

	private function buildSystemConfigEo(){
		try {
			$builder = new SystemConfigBundlesBuilder(PROPERTIES_SYS_CONFIG_FILE_NAME);
			$builder->buildBundle();
			$bundleEo = $builder->getBundleEo();
			BundlesFactory::$systemConfigEo = $bundleEo;
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::$className . '->buildSystemConfigEo() - ',$ex );
			throw $ex;
		}
	}
	public function getInstanceOfDbPropertiesEo(){
		if(!isset(BundlesFactory::$dbPropertiesEo)){
			if (!isset(BundlesFactory::$systemConfigEo)){
				BundlesFactory::buildSystemConfigEo();
			}
			$systemConfigEo = BundlesFactory::$systemConfigEo;
			$isProduction = $systemConfigEo->getIsProduction();
			if (isset($isProduction) && $isProduction){
				BundlesFactory::buildDbPropertiesProdEo();
			} else {
				BundlesFactory::buildDbPropertiesDevEo();
			}
		}
		return BundlesFactory::$dbPropertiesEo;
	}
	private static function buildDbPropertiesProdEo(){
		try {
			
			$builder = new DbPropertiesBundlesBuilder(PROPERTIES_PROD_FILE_NAME);
			$builder->buildBundle();
			$bundleEo = $builder->getBundleEo();

			BundlesFactory::$dbPropertiesEo = $bundleEo;
			
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::$className . '->buildDbPropertiesProdEo() - ',$ex );
			throw $ex;
		}
	}
	public function getInstanceOfDbPropertiesDevEo(){
		if(!isset(BundlesFactory::$dbPropertiesDevEo)){
			BundlesFactory::buildDbPropertiesProdEo();
		}
		return BundlesFactory::$dbPropertiesEo;
	}
	private static function buildDbPropertiesDevEo(){
		try {
				
			$builder = new DbPropertiesBundlesBuilder(PROPERTIES_DEV_FILE_NAME);
			$builder->buildBundle();
			$bundleEo = $builder->getBundleEo();
			
			BundlesFactory::$dbPropertiesEo = $bundleEo;
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::$className . '->buildDbPropertiesDevEo() - ',$ex );
			throw $ex;
		}
	}
}
?>