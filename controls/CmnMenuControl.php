<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( SOS_PATH . '/MenuSo.php');
include_once( SOS_PATH . '/OrderBySo.php');
include_once( CONTROLS_PATH . '/Control.php');
include_once( SERVICES_PATH . '/MenuMgr.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once( SOS_PATH . '/CodeSo.php');
include_once ( EOS_PATH . '/CodeEo.php');
include_once( SERVICES_PATH . '/CodeMgr.php');
class CmnMenuControl extends Control{
	private $className;
	private $logger;
	private $menuMgr;

	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();

	}
	private function init(){
		$this->menuMgr = new MenuMgr();
	}

	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	public function render(){
		try {
			$maxLv = $this->menuMgr->selectMaxLv();
			$so = new MenuSo();
			$so->setLv(0);
			$orderBySo = new OrderBySo();
			$orderBySo->setFieldName('seq');
			$orderBySo->setIsAsc(TRUE);
			$so->addOrderBySo($orderBySo);
			$menuArray = $this->menuMgr->select($so);
			echo '<ul class="sf-menu cmnMenuControl">';
			foreach($menuArray as $key => $value){
				$menuId = $value->getMenuId();
				$lv = $value->getLv();
				$nextLv = $lv + 1;
				$isShown = $value->getIsShown();
				if ($isShown){
					echo "<li>"; 
					$urlLangAppend = '';
					if (isset($this->currentLanguage)){
						$urlLangAppend = '&' . Controller::$PAGING_LANG . '=' . $this->currentLanguage;
					}

					$url = '';
					if ($this->currentLanguage == CodeEo::$CODE_TYPE_LANGAUGE_LANG_TC){
						$url = '<a href="' . $value->getUrl() . $urlLangAppend . '">' . $value->getLvMenuTc() . '</a>';
					}
					if ($this->currentLanguage == CodeEo::$CODE_TYPE_LANGAUGE_LANG_EN){
						$url = '<a href="' . $value->getUrl() . $urlLangAppend .  '">' . $value->getLvMenuEn() . '</a>';
					}
					


					echo $url;
					$this->traverseNode($menuId, $nextLv);
					echo '</li>';
				}
			}
			echo '</ul>' . "\n";
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->render()' ,$ex );
			throw $ex;
		}
	}
	public function traverseNode($lvParentMenuId, $lv){
		try {
			$so = new MenuSo();
			$so->setLv($lv);
			$so->setLvParentMenuId($lvParentMenuId);
			$orderBySo = new OrderBySo();
			$orderBySo->setFieldName('seq');
			$orderBySo->setIsAsc(TRUE);
			$so->addOrderBySo($orderBySo);
			$menuArray = $this->menuMgr->select($so);
			if (isset($menuArray)){
				echo '<ul>';
				foreach($menuArray as $key => $value){
					$menuId = $value->getMenuId();
					$lv = $value->getLv();
					$nextLv = $lv + 1;
					
					$isShown = $value->getIsShown();
					if ($isShown){
						echo "<li>";
						$url = '';
						$urlLangAppend = '';
						if (isset($this->currentLanguage)){
							$urlLangAppend = '&' . Controller::$PAGING_LANG . '=' . $this->currentLanguage;
						}
						if ($this->currentLanguage == CodeEo::$CODE_TYPE_LANGAUGE_LANG_TC){
							$url = '<a href="' . $value->getUrl() . $urlLangAppend .  '">' . $value->getLvMenuTc() . '</a>';
						}
						if ($this->currentLanguage == CodeEo::$CODE_TYPE_LANGAUGE_LANG_EN){
							$url = '<a href="' . $value->getUrl() . $urlLangAppend .  '">' . $value->getLvMenuEn() . '</a>';
						}

						echo $url;
						$this->traverseNode($menuId, $nextLv);
						echo '</li>';
					}
				}
				echo '</ul>';
			}
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->traverseMenuTree()' ,$ex );
			throw $ex;
		}
	}
	
}
?>