<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLS_PATH . '/Control.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once( SOS_PATH . '/MovieTypeSo.php');
include_once( EOS_PATH . '/MovieTypeEo.php');
include_once( SERVICES_PATH . '/MovieTypeMgr.php');
class MovieTypeControl extends Control{
	private $className;
	private $logger;
	private $userSessionVo;
	private $movieTypeMgr;
	private $movieTypeArray;
	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
	}
	
	private function init(){
		$this->movieTypeMgr = new MovieTypeMgr();
	}
	
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	
	public function render(){
		try {
			$so = new MovieTypeSo();
			$this->movieTypeArray = $this->movieTypeMgr->select($so);
			echo '<select class="movieTypeSelectControl" onchange="movieTypeSelect_onchange(event)">';
			echo '<option value="" selected>' . '</option>';
			if (isset($this->movieTypeArray)){
				foreach($this->movieTypeArray as $key=>$value){
					$movieTypeId = $value->getMovieTypeId();
					if (isset($this->currentLanguage) && $this->currentLanguage == CodeEo::$CODE_TYPE_LANGAUGE_LANG_TC){
						echo '<option value="' . $movieTypeId . '" >' . $value->getMovieTypeDescTc() . '</option>';
					}
					if (isset($this->currentLanguage) && $this->currentLanguage == CodeEo::$CODE_TYPE_LANGAUGE_LANG_EN){
						echo '<option value="' . $movieTypeId . '">' . $value->getMovieTypeDescEn() . '</option>';
					}
				}
			}
			echo '</select>';
			echo '<input type="hidden" class="movieTypeInputControl" />';
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->render() - ',$ex );
			throw $ex;
		}
	}
}
?>