<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
abstract class BundlesEo{
	private $className;
	private $logger;
	protected $lang;
	protected $defaultLang;
	protected $isEscapePaging;
	protected $pageNumber;
	protected $createdBy;
	protected $menuId;
	protected $blogId;
	public function __construct($defaultLang = NULL){
		$this->defaultLang = $defaultLang;
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
	}
	private function init(){
		$this->checkAndFillGetData();
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}

	private function checkAndFillGetData(){
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
}
?>