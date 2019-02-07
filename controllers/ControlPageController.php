<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once( SERVICES_PATH . '/CodeMgr.php');
include_once( SERVICES_PATH . '/CategoryMgr.php');
include_once( SOS_PATH . '/CodeSo.php');
include_once( SOS_PATH . '/OrderBySo.php');
include_once( SOS_PATH . '/CategorySo.php');
include_once( VOS_PATH . '/ControlPageVo.php');
include_once( VOS_PATH . '/CodeVo.php');
include_once( VOS_PATH . '/CategoryVo.php');
include_once( UTILS_PATH . '/DateTimeUtils.php');

class ControlPageController extends Controller{
	private $className;
	private $logger;
	private $codeMgr;
	private $codeVoArray;
	private $cookieVo;
	private $dateTimeUtils;
	private $controlPageVo;

	public function getControlVo(){

	}

	public function setControlVo($controlVo){
		$this->controlVo = $controlVo;
	}

	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();

		$this->checkAndFillPostData();
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
		$this->codeMgr = new CodeMgr();
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
				if (!isset($this->controlPageVo) || is_null($this->controlPageVo)){
					$this->controlPageVo= new ControlPageVo();
					if (isset($vo->command)){
						$this->controlPageVo->command = $vo->command;
					}
					if (isset($vo->voId)){
						$this->controlPageVo->voId = $vo->voId;
					}
					if (isset($vo->dataClassName)){
						$this->controlPageVo->dataClassName = $vo->dataClassName;
					}
					if ($this->controlPageVo->dataClassName == ControlPageVo::DATA_CLASS_NAME_COOKIE_VO){
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
				$this->controlPageVo->codeVoArray = $this->codeVoArray;
			}
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->fillLanguageCodeVo() - ',$ex );
			throw $ex;
		}

	}

	private function fillControlPageVo(){
		try {
			if (!isset($this->controlPageVo) || is_null($this->controlPageVo)){
				$this->controlPageVo= new ControlPageVo();
			}
			$this->fillLanguageCodeVo();
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->fillControlPageVo() - ',$ex );
			throw $ex;
		}
	}
	public function getVo(){
		if (!isset($this->controlPageVo)){
			$this->controlPageVo= new ControlPageVo();
		}

// 		$this->logger->info($this->className . '->getVo() - $this->landingPageVo=' . print_r($this->landingPageVo,1));

		return $this->controlPageVo;
	}

	public function renderControlPage(){
		try {
			$userSessionVo = NULL;
			if (isset($this->userSessionVo)){
				$userSessionVo = $this->userSessionVo;
			}
			$userVo;
			if (isset($this->userSessionVo->userVo)){
				$userVo = $userSessionVo->userVo;
			}
			$isAuthenticated = TRUE;
			if (isset($userVo) && isset($userVo->isAuthenticated)){
				if ($userVo->isAuthenticated){
				} else {
					$isAuthenticated = FALSE;
				}
			} else {
				$isAuthenticated = FALSE;
			}
			if (!$isAuthenticated){
				echo '<span class="systemMessageSpan">' . $this->commonPageBundlesEo->getUserDoesNotLogin() . '</span>';
			} else {
				echo '<table class="controlTable">';
				echo '<tbody>';
				echo '<tr>';
					echo '<td>';
					echo '<br/><br/><a href="' . HTML_PAGES_PATH. '/blog_page.php"><img src="' . HTML_IMAGES_BUTTONS_PATH . '/blog.png' . '" alt="blog.png" /></a><br/>Blog';
					echo '</td>';
					echo '<td>';
					echo '<br/><br/><a href="' . HTML_PAGES_PATH.'/movie_waiting_page.php"><img src="' . HTML_IMAGES_BUTTONS_PATH . '/movie.png' . '" alt="movie.png" /></a><br/>Movie';
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