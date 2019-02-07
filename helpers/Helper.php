<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
class Helper{
	private $className;
	private $logger;
	protected $lang;
	protected $defaultLang;
	protected $isEscapePaging;
	protected $pageNumber;
	protected $createdBy;
	protected $menuId;
	protected $blogId;
	function __construct($defaultLang = NULL) {
		$this->defaultLang = $defaultLang;
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
	}
	private function init(){
		$this->checkAndFillGetData();
	}
	protected function getIdArrayFromVo($vo){
		$idArray = NULL;
		try {
			if (isset($vo)){
				$idArray = array();
				foreach ($vo as $key=>$value){
					array_push($idArray, $value->id);
				}
			}
			
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->getIdArrayFromVo() - $vo=' . print_r($vo, 1) ,$ex );
			throw $ex;
		} 
		return $idArray;
	}
	private function fillClassName(){
		if (!isset($this->className)){
			$this->className =  __CLASS__;
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