<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once( CONTROLS_PATH . '/FileUploadControl.php');
include_once( SERVICES_PATH . '/BlogMgr.php');
include_once( SERVICES_PATH . '/CodeMgr.php');
include_once (SERVICES_PATH . '/CategoryMgr.php');
include_once( SOS_PATH . '/CodeSo.php');
include_once( SOS_PATH . '/BlogSo.php');
include_once( SOS_PATH . '/OrderBySo.php');
include_once ( SOS_PATH . '/CategorySo.php');
include_once( VOS_PATH . '/BlogPageVo.php');
include_once( VOS_PATH . '/BlogVo.php');
include_once( VOS_PATH . '/CodeVo.php');
include_once( VOS_PATH . '/CategoryVo.php');
include_once( UTILS_PATH . '/DateTimeUtils.php');
defined ( 'CATETORY_FIRST_LV' ) or define('CATETORY_FIRST_LV', 0);
defined ( 'FACEBOOK_BLOG_SHARE_URL_BASE' ) or define('FACEBOOK_BLOG_SHARE_URL_BASE', 'http://www.rabbitforever.com/rabbitforever/views/pages/blog_page.php?blog_id=');
defined ( 'GOOGLE_PLUS_SHARE_URL_BASE' ) or define('GOOGLE_PLUS_SHARE_URL_BASE', 'http://www.rabbitforever.com/rabbitforever/views/pages/blog_page.php?blog_id=');

class BlogController extends Controller{
	private $className;
	private $logger;
	private $blogMgr;
	private $codeMgr;
	private $categoryMgr;
	private $blogPageVo;
	private $codeVoArray;
	private $categoryVoArray;
	private $categoryVo;
	private $cookieVo;
	private $blogVo;
	private $dateTimeUtils;
	private $fileUploadControl;
	private $blogPageBundlesEo;
	
	const FACEBOOK_BLOG_SHARE_URL_BASE = FACEBOOK_BLOG_SHARE_URL_BASE;
	const GOOGLE_PLUS_SHARE_URL_BASE = GOOGLE_PLUS_SHARE_URL_BASE;
	const CATETORY_FIRST_LV = CATETORY_FIRST_LV;
	
	public function getBlogPageBundlesEo(){
		return $this->blogPageBundlesEo;
	}
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
		$this->fillBlogPageVo();
		$this->fileUploadControl = new FileUploadControl();
		$this->blogPageBundlesEo= $this->bundlesFactory->getInstanceOfBlogPageBundlesEo();
	}
	public function renderFileUpload(){
		$this->fileUploadControl->render();
	}
	public function renderBundleJs(){
		try{
			$this->commonPageBundlesEo->printAllPropertiesToJsBundleVo();
			$this->blogPageBundlesEo->printAllPropertiesToJsBundleVo();

		} catch (Exception $ex) {
			$this->logger->error( $this->className . '->renderBundleJs() - $this->commonPageBundlesEo=' . print_r($this->$commonPageBundlesEo,1), $ex);
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
// 	private function redirectToPageOne(){
// 		$uri = $_SERVER['REQUEST_URI'];
// 		$containQuestionMark = strpos($uri, '?');
// 		if ($containQuestionMark){
// 			header('Location: ' . $_SERVER['REQUEST_URI'] . '&page_no=1');
// 		} else {
// 			header('Location: ' . $_SERVER['REQUEST_URI'] . '?page_no=1');
// 		}
// 	}

	private function checkAndFillPostData(){
		try {
			if (isset($_POST['data'])){
				$dataString = $_POST['data'];
				$dataObj = json_decode($dataString);
				$vo = $dataObj->vo;
				if (!isset($this->blogPageVo) || is_null($this->blogPageVo)){
					$this->blogPageVo = new BlogPageVo();
					if (isset($vo->command)){
						$this->blogPageVo->command = $vo->command;
					}
					if (isset($vo->voId)){
						$this->blogPageVo->voId = $vo->voId;
					}
					if (isset($vo->dataClassName)){
						$this->blogPageVo->dataClassName = $vo->dataClassName;
					}
						
					if ($this->blogPageVo->dataClassName == BlogPageVo::DATA_CLASS_NAME_BLOG_VO){
						$dataInstance = $vo->dataInstance;

						if (isset($dataInstance)){
							$this->createBlogVo($dataInstance);
						}

					}
					if ($this->blogPageVo->dataClassName == BlogPageVo::DATA_CLASS_NAME_CATEGORY_VO){
						$dataInstance = $vo->dataInstance;
						if (isset($dataInstance)){
							$this->createCategoryVo($dataInstance);
						}
					}
					if ($this->blogPageVo->dataClassName == BlogPageVo::DATA_CLASS_NAME_COOKIE_VO){
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
			$this->blogPageVo->blogVo = $vo;
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
				$this->blogPageVo->cookieVo = $vo;
		
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
				$this->blogPageVo->categoryVo = $vo;
				
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
				// $this->logger->info($this->className . '->selectCategoryVo() - $categoryVo:' . $nextLv);
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
			$this->logger->error ($this->className . '->selectCategoryVo() - $this->blogPageVo->categoryVo=' . $this->blogPageVo->categoryVo ,$ex );
			throw $ex;
		}
	}
	public function saveVo(){
		$isSaved = FALSE;
		try {
			if(isset($this->blogPageVo)){
				$vo = $this->blogPageVo->blogVo;
				$id = $vo->id;				
				$eo = new BlogEo($vo);
				if (isset($id) && $id > 0){
					$affectedRow = $this->blogMgr->update($eo);
					if ($affectedRow == 1){
						$isSaved = TRUE;
					}
				} else {
					$eo->setId(NULL);
					$id = $this->blogMgr->insert($eo);
					if (isset($id) && $id > 0){
						$isSaved = TRUE;
					}
				}
				if ($isSaved){
					$this->blogPageVo->isSaved = TRUE;
				} else {
					$this->blogPageVo->isSaved = FALSE;
				}
			} 
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->saveVo()',$ex );
			throw $ex;
		}
	}
	public function deleteVo(){
		$isDeleted = FALSE;
		try {
			if(isset($this->blogPageVo)){
				$vo = $this->blogPageVo->blogVo;
				$id = $vo->id;
				$eo = new BlogEo($vo);
				if (isset($id) && $id > 0){
					$affectedRow = $this->blogMgr->delete($eo);
					if ($affectedRow == 1){
						$isSaved = TRUE;
					}
				}
				if ($isSaved){
					$this->blogPageVo->isSaved = TRUE;
				} else {
					$this->blogPageVo->isSaved = FALSE;
				}
			}
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->deleteVo()',$ex );
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
				$this->blogPageVo->codeVoArray = $this->codeVoArray;
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
	private function fillBlogPageVo(){
		try {
			if (!isset($this->blogPageVo) || is_null($this->blogPageVo)){
				$this->blogPageVo = new BlogPageVo();
			}
			$this->fillLanguageCodeVo();
			$this->fillFirstLvCategoryVo();
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->fillBlogPageVo() - ',$ex );
			throw $ex;
		}
	}
	public function getVo(){
		if (!isset($this->blogPageVo)){
			$this->blogPageVo = new BlogPageVo();
		}
		if (isset($this->categoryVoArray)){
			$this->blogPageVo->categoryVoArray = $this->categoryVoArray;
		}
// 		$this->logger->info($this->className . '->getVo() - $this->blogPageVo=' . print_r($this->blogPageVo,1));
		
		return $this->blogPageVo;
	}
	public function renderFirstLevelCategory(){
		try {
			$categoryVoArray = $this->categoryVoArray;
			
			
			if (isset($categoryVoArray)){
				echo '<select class="categoryselect categoryselect0" onchange="categorySelectChange(event, 0)">';
				echo '<option value="" selected="selected"></option>';
				foreach($categoryVoArray as $key=>$value){
					if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
						echo '<option value="' . $value->menuId .'">' . $value->lvMenuTc . '</option>';
					} else
						if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
							echo '<option value="' . $value->menuId .'">' . $value->lvMenuEn . '</option>';
						} else {
							echo '<option value="' . $value->menuId .'">' . $value->lvMenuEn . '</option>';
						}
						
				}
				echo '</select><br class="categoryselectbr0"/>';
			}

		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->renderFirstLevelCategory() - ',$ex );
			throw $ex;
		}
	}
	
	public function renderLanguageSelect(){
		try {
			$codeVoArray = $this->codeVoArray;
			echo '<select class="languageselect" onchange="languageselect_modal_onchange(event)">';
			foreach($codeVoArray as $key=>$value){
				$optionHtml = '<option value="' . $value->code .'"';
				if ($value->code == $this->defaultLanguage){
					$optionHtml .= ' selected>'; 

				} else {
					$optionHtml .= '>'; 
				}
				
				
				if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
					$optionHtml .= $value->descTc . '</option>';
				} else
					if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
						$optionHtml .= $value->descEn . '</option>';

				} else {
					$optionHtml .= $value->descEn . '</option>';
				}
				
				echo $optionHtml;
				
			}
			echo '</select>';
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->renderLanguageSelect() - ',$ex );
			throw $ex;
		}
	}
	public function renderAddBlogButton(){
		try {
			$userSessionVo = NULL;
			if (isset($this->userSessionVo)){
				$userSessionVo = $this->userSessionVo;
			}
			$userVo;
			if (isset($this->userSessionVo->userVo)){
				$userVo = $userSessionVo->userVo;
			}
			if (isset($userVo)){
				if (isset($userVo->isAuthenticated)){
					if ($userVo->isAuthenticated){
						$addButtonLine = '<input type="button" class="smallbutton addiconbutton addiconbuttonblog" onclick="addBlog(event)"  />';
						echo $addButtonLine;
			
					}
				}
			}			
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->renderAddBlogButton()',$ex );
			throw $ex;
		}
	}
	public function renderBlogs(){
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
			if (isset($this->blogId)){
				$so->setId($this->blogId);
			}
			
			$orderBySo = new OrderBySo();
			$orderBySo->setFieldName('blog_date');
			$orderBySo->setIsAsc(FALSE);
			$so->addOrderBySo($orderBySo);
			
			
			$defaultBlogRecordsPerPage = $this->systemConfigEo->getDefaultBlogRecordsPerPage();
			$this->$defaultBlogRecordsPerPage = $defaultBlogRecordsPerPage;
			$countAll = $this->blogMgr->selectCount($so);
			$this->totalNoOfPage = ceil($countAll / $defaultBlogRecordsPerPage);
			if (isset($this->pageNumber) && $this->pageNumber !== NULL){
				$limitFrom = ($this->pageNumber -1) * $defaultBlogRecordsPerPage;
				$limitOffset = $defaultBlogRecordsPerPage;

				$so->setLimitFrom($limitFrom);
				$so->setLimitOffset($limitOffset);
			}
			if (isset($this->createdBy) && $this->createdBy !== NULL){
				$createdBy = $this->createdBy;
				$so->setCreatedBy($createdBy);
			}
			
			$blogArray = $this->blogMgr->select($so);

			if ($blogArray === NULL || !isset($blogArray)){
				echo '<span class="norecordfound">no record found!</span>';
				return;
			}
			$pageControlHtml =  '<div class="pagecontroldiv">'
					. 'page&nbsp;';
					$pageControlHtml .= '<select class="pageselect" onchange="pageselect_onchange(event)">';
					for($i=0; $i < $this->totalNoOfPage; $i++){
						$pageNo = $i + 1;
						if ($pageNo == $this->pageNumber){
							$pageControlHtml .= '<option value="' . $pageNo . '" selected >' . $pageNo .'</option>';
						} else {
							$pageControlHtml .= '<option value="' . $pageNo . '">' . $pageNo .'</option>';
						}
					}
					$pageControlHtml .= '</select>';
					$pageControlHtml .='&nbsp;of&nbsp;' . $this->totalNoOfPage;
					$pageControlHtml .= '</div>';
					echo '<br/>' . $pageControlHtml;
			foreach($blogArray as $key => $value){
				$menuId = $value->getCategoryId();
				$categoryEoDisplayString = $this->categoryMgr->getCategoryEoDisplayString($menuId);
				// page controller

				

				echo '<table class="blogtable">';
				echo '<tbody>';
				echo '<tr>';
				
				$blogDate = $value->getBlogDate();
				//$this->logger->info('type:' . gettype($blogDate));
 				$displayDateTimeString = $this->dateTimeUtils->formatDisplayDateTimeString($blogDate);
				
				$dateAndButtonLine = '<td>'; 
				// facebook
				$facebookLine = '<!-- Your share button code --><div class="fb-share-button" data-href="' .FACEBOOK_BLOG_SHARE_URL_BASE . $value->getId() . '" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.rabbitforever.com%2F&amp;src=sdkpreparse">Share</a></div>';
				$googlePlusLine = '<div class="g-plus" data-action="share" data-href="'. GOOGLE_PLUS_SHARE_URL_BASE . $value->getId() . '"></div>';
				if (isset($userVo)){
					if (isset($userVo->isAuthenticated)){
						if ($userVo->isAuthenticated){
							$dateAndButtonLine = $dateAndButtonLine . '&nbsp;&nbsp;<input type="button" class="smallbutton editiconbutton" onclick="editBlog(event)" />';
							$dateAndButtonLine = $dateAndButtonLine . '&nbsp;<input type="button" class="smallbutton deleteiconbutton" onclick="deleteBlog(event)" />';
						}
					}
				}
				$dateAndButtonLine .= '<input type="hidden" class="idInput" value="' . $value->getId() . '"/>';
				$dateAndButtonLine .= '<span class="blogDateSpan">' . $displayDateTimeString . '</span>~~~~~~' . '<span class="createdbyspan">' . $value->getCreatedBy() . '</span>';
				$dateAndButtonLine.= '<br/>' .$facebookLine  . '&nbsp;' . $googlePlusLine;
				$dateAndButtonLine = $dateAndButtonLine . '</td>';
				echo $dateAndButtonLine;
				echo '</tr>';
				echo '<tr>';
				echo '<td><h3 class="subjectH3">' . $value->getSubject() . '</h3></td>';
				echo '</tr>';
				echo '<tr style="display:none">';
				echo '<td class="contentTd">';
				echo $value->getContent();
				echo '</td>';
				echo '</tr>';
				echo '<tr>';
				echo '<td class="contentCmTd">' . $value->getContentCm() . 
				'</td>';
				echo '</tr>';
				echo '<tr style="display:none">';
				echo '<td>';
				echo 	'<input type="hidden" class="languageCodeInput" value="' . $value->getLanguageCode() . '"/>'.
						'<input type="hidden" class="categoryIdInput" value="' . $value->getCategoryId() . '"/>' .
						'<input type="hidden" class="createdByInput" value="' . $value->getCreatedBy() . '"/>' .
						'<input type="hidden" class="updatedByInput" value="' . $value->getUpdatedBy() . '"/>' .
						'<input type="hidden" class="createdDateStringInput" value="' . $this->dateTimeUtils->formatDisplayDateTimeString($value->getCreatedDate()) . '"/>' .
						'<input type="hidden" class="remarksInput" value="' . $value->getRemarks() . '"/>' .
						'<input type="hidden" class="categoryDisplayInput" value="' . $categoryEoDisplayString . '"/>';
				echo '</td>';
				echo '</tr>';
				echo '</tbody>';
				echo '</table>';
			}
			
			
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->renderBlog()',$ex );
			throw $ex;
		}
	}
}
?>