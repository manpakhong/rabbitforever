<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once( CONTROLLERS_PATH . '/BlogController.php');
include_once( SERVICES_PATH . '/BlogMgr.php');
include_once( SERVICES_PATH . '/CodeMgr.php');
include_once( SERVICES_PATH . '/CategoryMgr.php');
include_once( SOS_PATH . '/CodeSo.php');
include_once( SOS_PATH . '/BlogSo.php');
include_once( SOS_PATH . '/OrderBySo.php');
include_once( SOS_PATH . '/CategorySo.php');
include_once( VOS_PATH . '/LandingPageVo.php');
include_once( VOS_PATH . '/BlogVo.php');
include_once( VOS_PATH . '/CodeVo.php');
include_once( VOS_PATH . '/CategoryVo.php');
include_once( UTILS_PATH . '/DateTimeUtils.php');

class LandingPageController extends Controller{
	private $className;
	private $logger;
	private $blogMgr;
	private $codeMgr;
	private $categoryMgr;
	private $landingPageVo;
	private $codeVoArray;
	private $categoryVoArray;
	private $categoryVo;
	private $cookieVo;
	private $blogVo;
	private $blogVoArray;
	private $blogVoArray1;
	private $blogVoArray2;
	private $dateTimeUtils;

	public function getBlogVo(){
		return $this->blogVo;
	}

	public function setBlogVo($blogVo){
		$this->blogVo = $blogVo;
	}
	public function getCategoryVo(){
		return $this->categoryVo;
	}

	public function setCategoryVo($categoryVo){
		$this->categoryVo = $categoryVo;
	}
	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();

		$this->checkAndFillPostData();
		$this->fillLandingPageVo();
	}
	public function renderFileUpload(){
		$this->fileUploadControl->render();
	}
	public function saveVo(){
		try {
			throw new Exception('Not implemented');
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->saveVo() - $_POST["data"]=' . $_POST["data"] ,$ex );
			throw $ex;
		}
	}
	private function init(){
		$this->blogMgr = new BlogMgr ();
		$this->codeMgr = new CodeMgr();
		$this->categoryMgr = new CategoryMgr();
		$this->dateTimeUtils = DateTimeUtils::getInstance();

	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	private function fillRootLvMenu(){

	}

	private function checkAndFillPostData(){
		try {
			if (isset($_POST['data'])){
				$dataString = $_POST['data'];
				$dataObj = json_decode($dataString);
				$vo = $dataObj->vo;
				if (!isset($this->landingPageVo) || is_null($this->landingPageVo)){
					$this->landingPageVo = new LandingPageVo();
					if (isset($vo->command)){
						$this->landingPageVo->command = $vo->command;
					}
					if (isset($vo->voId)){
						$this->landingPageVo->voId = $vo->voId;
					}
					if (isset($vo->dataClassName)){
						$this->landingPageVo->dataClassName = $vo->dataClassName;
					}

					if ($this->landingPageVo->dataClassName == LandingPageVo::DATA_CLASS_NAME_BLOG_VO){
						$dataInstance = $vo->dataInstance;

						if (isset($dataInstance)){
							$this->createBlogVo($dataInstance);
						}
					}
					if ($this->landingPageVo->dataClassName == LandingPageVo::DATA_CLASS_NAME_CATEGORY_VO){
						$dataInstance = $vo->dataInstance;
						if (isset($dataInstance)){
							$this->createCategoryVo($dataInstance);
						}
					}
					if ($this->landingPageVo->dataClassName == LandingPageVo::DATA_CLASS_NAME_COOKIE_VO){
						$dataInstance = $vo->dataInstance;
						if (isset($dataInstance)){
							$this->createCookieVo($dataInstance);
						}
					}
				}
				$this->logger->info($this->className . '->checkAndFillPostData() - $dataString=' . $dataString);
			}
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->checkAndFillPostData() - $_POST["data"]=' . $_POST["data"] ,$ex );
			throw $ex;
		}
	}
	private function createBlogVo($dataInstance){
		if (isset($dataInstance)){
			$vo = new BlogVo();
			$vo->id = $dataInstance->id;
			$vo->blogDate = $dataInstance->blogDate;
			$vo->subject= $dataInstance->subject;
			$vo->content= $dataInstance->content;
			$vo->contentCm= $dataInstance->contentCm;
			$vo->languageCode= $dataInstance->languageCode;
			$vo->categoryId= $dataInstance->categoryId;
			$vo->updatedBy= $dataInstance->updatedBy;
			$vo->createdDateString= $dataInstance->createdDateString;
			$vo->createdDate= $dataInstance->createdDate;
			$vo->createdBy = $dataInstance->createdBy;
			$vo->updatedDateString= $dataInstance->updatedDateString;
			$vo->updatedDate= $dataInstance->updatedDate;
			$vo->remarks= $dataInstance->remarks;
			$this->blogVo = $vo;
			$this->landingPageVo->blogVo = $vo;
		}
	}
	private function createCookieVo($dataInstance){
		try {
			//$this->logger->info($this->className . '->createCookieVo() - ' . print_r($dataInstance,1));
			if (isset($dataInstance)){
				$vo = new CookieVo();
				$vo->currentSelectedLang = $dataInstance->currentSelectedLang;

				$this->logger->info($this->className . '->createCookieVo() - ' . print_r($vo,1));
				$this->cookieVo = $vo;
				$this->landingPageVo->cookieVo = $vo;
// 				$this->logger->info($this->className . '->createCategoryVo() - ' . print_r($this->categoryVo,1));
			} else {
// 				$this->logger->info($this->className . '->createCategoryVo() - !isset($dataInstance)');
			}

		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->createCookieVo() - $dataInstance=' . $dataInstance ,$ex );
			throw $ex;
		}
	}
	private function createCategoryVo($dataInstance){
		try {
			//$this->logger->info($this->className . '->createCategoryVo() - ' . print_r($dataInstance,1));
			if (isset($dataInstance)){
				$vo = new CategoryVo();
				$vo->id = $dataInstance->id;
				$vo->menuId = $dataInstance->menuId;
				$vo->seq= $dataInstance->seq;
				$vo->lv= $dataInstance->lv;
				$vo->lvMenuEn= $dataInstance->lvMenuEn;
				$vo->lvMenuTc= $dataInstance->lvMenuTc;
				$vo->lvParentMenuId= $dataInstance->lvParentMenuId;
				$vo->isShown= $dataInstance->isShown;
				$vo->isEnabled= $dataInstance->isEnabled;
				$vo->isCategory= $dataInstance->isCategory;
				$vo->url = $dataInstance->url;
				$vo->createdBy= $dataInstance->createdBy;
				$vo->updatedBy= $dataInstance->updatedBy;
				$vo->createdDate = $dataInstance->createdDate;
				$vo->createdDateString = $dataInstance->createdDateString;
				$vo->updatedDate = $dataInstance->updatedDate;
				$vo->updatedDateString = $dataInstance->updatedDateString;
				$vo->remarks= $dataInstance->remarks;
				$this->logger->info($this->className . '->createCategoryVo() - ' . print_r($vo,1));
				$this->categoryVo = $vo;
				$this->landingPageVo->categoryVo = $vo;
// 				$this->logger->info($this->className . '->createCategoryVo() - ' . print_r($this->categoryVo,1));
			} else {
// 				$this->logger->info($this->className . '->createCategoryVo() - !isset($dataInstance)');
			}

		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->createCategoryVo() - $dataInstance=' . $dataInstance ,$ex );
			throw $ex;
		}

	}
	public function updateCookieVo(){
		try {
// 			$this->logger->info($this->className . '->selectCategoryVo() - ' . print_r($this->categoryVo, 1));
			if (isset($this->cookieVo)){
				$cookieVo = $this->cookieVo;
				// 1 hour;
				$cookieExpiryHour = $this->systemConfigEo->getCookieExpiryHr();
				setcookie(CookieVo::$COOKIE_CURRENT_SELECTED_LANG, $cookieVo->currentSelectedLang, $cookieExpiryHour);
// 				$this->logger->info ($this->className . '->selectCategoryVo() - $this->categoryVoArray=' . print_r($this->categoryVoArray, 1));
			} else {
				$this->logger->warn($this->className . '->updateCookieVo() - $this->cookieVo=' . print_r($this->cookieVo, 1));
			}

		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->updateCookieVo() - $this->cookieVo=' . $this->cookieVo ,$ex );
			throw $ex;
		}
	}
	public function selectCategoryVo(){
		try {
// 			$this->logger->info($this->className . '->selectCategoryVo() - ' . print_r($this->categoryVo, 1));
			if (isset($this->categoryVo)){
				$categoryVo = $this->categoryVo;
				$nextLv = $categoryVo->lv + 1;
// 				$this->logger->info($this->className . '->selectCategoryVo() - $categoryVo:' . $nextLv);
				$lvParentMenuId = $categoryVo->lvParentMenuId;
				$isShown = $categoryVo->isShown;
				$isEnabled = $categoryVo->isEnabled;
				$isCategory = $categoryVo->isCategory;
				$menuId = $categoryVo->menuId;
				$so = new CategorySo();
				$so->setLv($nextLv);
				$so->setLvParentMenuId($menuId);
				$so->setIsShown($isShown);
				$so->setIsEnabled($isEnabled);
				$so->setIsCategory($isCategory);

				$categoryEoArray = $this->categoryMgr->select($so);

				$this->categoryVoArray = array();
				if (isset($categoryEoArray)){
					foreach($categoryEoArray as $key=>$value){
						$categoryVo = new CategoryVo($value);
						array_push($this->categoryVoArray, $categoryVo);
					}
				}
// 				$this->logger->info ($this->className . '->selectCategoryVo() - $this->categoryVoArray=' . print_r($this->categoryVoArray, 1));
			} else {
				$this->logger->warn ($this->className . '->selectCategoryVo() - $this->categoryVoArray=' . print_r($this->categoryVoArray, 1));
			}

		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->selectCategoryVo() - $this->landingPageVo->categoryVo=' . $this->landingPageVo->categoryVo ,$ex );
			throw $ex;
		}
	}

	private function fillLanguageCodeVo(){
		try {
			$so = new CodeSo();
			$so->setCodeType('language');
			$codeEoArray = $this->codeMgr->select($so);
			if (isset($codeEoArray)){
				$this->codeVoArray = array();
				foreach($codeEoArray as $key=>$value){
					$codeVo = new CodeVo($value);
					array_push($this->codeVoArray, $codeVo);
				}
				$this->landingPageVo->codeVoArray = $this->codeVoArray;
			}
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->fillLanguageCodeVo() - ',$ex );
			throw $ex;
		}

	}
	private function fillFirstLvCategoryVo(){
		try {
			$so = new CategorySo();
			$so->setLv(CATETORY_FIRST_LV);
			$categoryEoArray = $this->categoryMgr->select($so);

			if (isset($categoryEoArray)){
				$this->categoryVoArray = array();
				foreach ($categoryEoArray as $key=>$value){
					$categoryVo = new CategoryVo($value);
					array_push($this->categoryVoArray, $categoryVo);
				}
			}
				
			//$this->logger->info($this->className . '->fillFirstLvCategoryVo() - $this->categoryVoArray=' . print_r($this->categoryVoArray,1));
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->fillFirstLvCategory()', $ex );
			throw $ex;
		}
	}
	private function fillLandingPageVo(){
		try {
			if (!isset($this->landingPageVo) || is_null($this->landingPageVo)){
				$this->landingPageVo = new LandingPageVo();
			}
			$this->fillLanguageCodeVo();
			$this->fillFirstLvCategoryVo();
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->fillLandingPageVo() - ',$ex );
			throw $ex;
		}
	}
	public function getVo(){
		if (!isset($this->landingPageVo)){
			$this->landingPageVo = new LandingPageVo();
		}
		if (isset($this->categoryVoArray)){
			$this->landingPageVo->categoryVoArray = $this->categoryVoArray;
		}
// 		$this->logger->info($this->className . '->getVo() - $this->landingPageVo=' . print_r($this->landingPageVo,1));

		return $this->landingPageVo;
	}

	public function renderRecentUpdated(){
		try {
			$userSessionVo = NULL;
			if (isset($this->userSessionVo)){
				$userSessionVo = $this->userSessionVo;
			}
			$userVo;
			if (isset($this->userSessionVo->userVo)){
				$userVo = $userSessionVo->userVo;
			}
			$so = new BlogSo();
				
			if (isset($this->menuId)){
				$so->setCategoryId($this->menuId);
			}
				
			if (isset($this->lang)){
				$so->setLanguageCode($this->lang);
			}
				
			if (isset($this->createdBy)){
				$so->setCreatedBy($this->createdBy);
			}
				
			$orderBySo = new OrderBySo();
			$orderBySo->setFieldName('blog_date');
			$orderBySo->setIsAsc(FALSE);
			$so->setLimitFrom(0);
			$so->setLimitOffset($this->systemConfigEo->getDefaultRecentUpdateRecords());
			$so->addOrderBySo($orderBySo);
			echo '<table class="allrecentwritingtable">';
			$blogEoArray = $this->blogMgr->select($so);
			if (isset($blogEoArray) && count($blogEoArray) > 0){
				foreach($blogEoArray as $key=>$value){
					$menuId = $value->getCategoryId();
					$categoryDisplay = $this->categoryMgr->getCategoryEoDisplayString($menuId, $this->lang);
					echo '<tr>';
					echo '<td>';
					echo $value->getBlogDate();
					echo '</td>';
					echo '<td>';
					echo '<a href="blog_page.php?'. Controller::$PAGING_BLOG_ID .'='. $value->getId() . '&' .Controller::$PAGING_MENU_ID . '=' . $menuId . '&lang=' . $this->lang . '">';
					echo $value->getSubject();
					echo '</a>';
					echo '</td>';
					echo '<td>';
					echo $categoryDisplay;
					echo '</td>';
					echo '<td>';
					echo '<span class="createdbyspan">';
					echo '~~~' . $value->getCreatedBy();
					echo '</span>';
					echo '</td>';
					echo '</tr>';
				}
			}
			echo '</table>';
			
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->renderBlog()',$ex );
			throw $ex;
		}
	}
	public function renderRandomRecentUpdated(){
		try {
			$userSessionVo = NULL;
			if (isset($this->userSessionVo)){
				$userSessionVo = $this->userSessionVo;
			}
			$userVo;
			if (isset($this->userSessionVo->userVo)){
				$userVo = $userSessionVo->userVo;
			}
			$so = new BlogSo();
	
			if (isset($this->menuId)){
				$so->setCategoryId($this->menuId);
			}
	
			if (isset($this->lang)){
				$so->setLanguageCode($this->lang);
			}
	
			if (isset($this->createdBy)){
				$so->setCreatedBy($this->createdBy);
			}
	
			$orderBySo = new OrderBySo();
			$orderBySo->setFieldName('blog_date');
			$orderBySo->setIsAsc(FALSE);
			$so->addOrderBySo($orderBySo);
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->renderBlog()',$ex );
			throw $ex;
		}
	}
}
?>