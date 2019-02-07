<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLS_PATH . '/CmnMenuControl.php');
include_once ( CONTROLS_PATH . '/UserSessionControl.php');
include_once( CONTROLS_PATH . '/DialogBox.php');
include_once (UTILS_PATH . '/FileUtils.php');
include_once (FACTORIES_PATH . '/BundlesFactory.php');
include_once( CONTROLS_PATH . '/LangSelectControl.php');
abstract class Controller{
	public static $PAGING_PAGE_NO = 'page_no';
	public static $PAGING_IS_ESCAPE_PAGING = 'is_escape_paging';
	public static $PAGING_CREATED_BY = 'created_by';
	public static $PAGING_MENU_ID = 'menu_id';
	public static $PAGING_BLOG_ID = 'blog_id';
	public static $PAGING_LANG = 'lang';
	private $className;
	private $logger;
	private $cmnMenuControl;
	private $dialogBox;
	private $userSessionControl;
	private $langSelectControl;
	private $fileUtils;
	protected $defaultLanguage;
	protected $bundlesFactory;
	protected $systemConfigEo;
	protected $commonPageBundlesEo;
	protected $userSessionVo;
	
	
	protected $defaultBlogRecordsPerPage;
	protected $totalNoOfPage;
	protected $isEscapePaging;
	protected $pageNumber;
	
	protected $createdBy;
	protected $menuId;
	protected $lang;
	protected $blogId;
	
	public function __construct(){
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
	}
	public function getCommonPageBundlesEo(){
		return $this->commonPageBundlesEo;
	}
	abstract public function getVo();
	abstract public function saveVo();
	private function init(){
		$this->cmnMenuControl = new CmnMenuControl();
		$this->dialogBox = new DialogBox();
		$this->userSessionControl = new UserSessionControl();
		$this->userSessionVo = $this->userSessionControl->getUserSessionVo();
		$this->bundlesFactory = BundlesFactory::getInstance();
		$this->fileUtils = new FileUtils();
		$this->systemConfigEo = $this->bundlesFactory->getInstanceOfSystemConfigEo();
		$this->commonPageBundlesEo = $this->bundlesFactory->getInstanceOfCommonPageBundlesEo();
		$this->defaultLanguage = $this->systemConfigEo->getDefaultLanguage();
		$this->langSelectControl = new LangSelectControl();
		$this->checkAndFillGetData();
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}	
	private function checkAndFillGetData(){
// 		if (!isset($_GET[Controller::$IS_ESCAPE_PAGING])){
// 			if (!isset($_GET[Controller::$PAGE_NUMBER])){
// 				$this->redirectToPageOne();
// 			}
// 		} else {
// 			$isEscapePagingString = $_GET[Controller::$IS_ESCAPE_PAGING];
// 			$isEscapePaging = (int) $isEscapePagingString;
// 			$this->isEscapePaging = $isEscapePaging;
// 			if ($isEscapePaging != 1){
// 				if (!isset($_GET[Controller::$PAGE_NUMBER])){
// 					$this->redirectToPageOne();
// 				}
// 			}
// 		}

		
		
		if (isset($_GET[Controller::$PAGING_IS_ESCAPE_PAGING])){
			$isEscapePagingString = $_GET[Controller::$PAGING_IS_ESCAPE_PAGING];
			$isEscapePaging = (int) $isEscapePagingString;
			$this->isEscapePaging = $isEscapePaging;
		}
		if (isset($_GET[Controller::$PAGING_PAGE_NO])){
			$pageNumberString = $_GET[Controller::$PAGING_PAGE_NO];
			$this->pageNumber = (int) $pageNumberString;
		}
		if (isset($_GET[Controller::$PAGING_CREATED_BY])){
			$createdByString = $_GET[Controller::$PAGING_CREATED_BY];
			$this->createdBy = $createdByString;
		}
		if (isset($_GET[Controller::$PAGING_MENU_ID])){
			$menuIdString = $_GET[Controller::$PAGING_MENU_ID];
			$this->menuId = $menuIdString;
		}
		if (isset($_GET[Controller::$PAGING_LANG])){
			$langString = $_GET[Controller::$PAGING_LANG];
			$this->lang = $langString;
		}
		if (isset($_GET[Controller::$PAGING_BLOG_ID])){
			$idString = $_GET[Controller::$PAGING_BLOG_ID];
			$this->blogId = (int) $idString;
		}
	}
	public function genAlertBox($message, $confirmUrl){
		try {
			$this->dialogBox->genAlertBox($message, $confirmUrl);
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->genAlertBox() - $message=' . $message . ',$confirmUrl=' . $confirmUrl ,$ex );
			throw $ex;
		}

	}
	public function genDialogBox($message, $title, $confirmUrl){
		try {
			$this->dialogBox->genDialogBox($message, $title, $confirmUrl);
				
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->genDialogBox() - $message=' . $message . ',$title='. $title. ',$confirmUrl=' . $confirmUrl,$ex );
			throw $ex;
		}

	}
	public function renderCmnMenu(){
		try {
			$this->cmnMenuControl->render();
		
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->renderCmnMenu()',$ex );
			throw $ex;
		}

	}
	public function renderLangSelectControl(){
		try{
			$this->langSelectControl->render();
		} catch (Exception $ex){
			$this->logger->error ($this->className . '->renderLangSelectControl()',$ex );
			throw $ex;
		}
	}
	public function renderHiddenSystemParams(){
		try{
			echo '<div class="hiddensystemparams">';
			echo '<input type="hidden" class="defaultLanguageInput" value="' . $this->defaultLanguage . '" />';
			echo '</div>';
		} catch (Exception $ex){
			$this->logger->error ($this->className . '->renderHiddenSystemParams()',$ex );
			throw $ex;
		}
	}
	public function renderUserSession(){
		try{
			$this->userSessionControl->render();
		} catch (Exception $ex){
			$this->logger->error ($this->className . '->renderUserSession()',$ex );
			throw $ex;
		}
	}
	public function getUserSessionVo(){
		return $this->userSessionVo;
	}
	public function renderBackgroundFileName(){
		try{
			$backgroundsPath = $this->systemConfigEo->getBackgroundsPath();
			$directory = IMAGES_PATH . '/' . $backgroundsPath;
			$fileArray = $this->fileUtils->getFileArrayInDirectory($directory);
			$fileName = $this->fileUtils->getRandomFileNameInFileArray($fileArray);
			echo '<input type="hidden" class="backgroundinput" value="' . HTML_IMAGES_PATH . '/'. $backgroundsPath. '/'.  $fileName . '" />';
		} catch (Exception $ex){
			$this->logger->error ($this->className . '->renderBackgroundFileName()',$ex );
			throw $ex;
		}
	}
	public function setUserSessionVo($userSessionVo){
		$this->userSessionVo = $userSessionVo;
	}
	private function isAjax(){
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}
	
}
?>