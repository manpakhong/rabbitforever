<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLS_PATH . '/Control.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once ( EOS_PATH . '/CodeEo.php');
include_once( SERVICES_PATH . '/CodeMgr.php');
include_once ( SOS_PATH . '/MovieTypeSo.php');
include_once ( SOS_PATH . '/CodeSo.php');
class MovieClassControl extends Control{
	private $className;
	private $logger;
	private $userSessionVo;
	private $codeMgr;
	private $movieClassArray;
	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
	}
	
	private function init(){
		try {
			$this->codeMgr = new CodeMgr();
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->init()' ,$ex );
			throw $ex;
		}
		
		
	}
	
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	public function render(){
		try {
			$so = new CodeSo();
			$so->setCodeType(CodeEo::$CODE_TYPE_MOVIE_CLASS);
			$this->movieClassArray= $this->codeMgr->select($so);

			if (isset($this->movieClassArray)){

				echo '<select class="movieClassSelectControl" onchange="movieClassSelect_on_change(event)">';
				echo '<option value="" selected>' . '</option>';
				foreach ($this->movieClassArray as $key=>$value){
					if ($this->currentLanguage == CodeEo::$CODE_TYPE_LANGAUGE_LANG_EN){
						echo '<option value="' . $value->getCode() . '">' . $value->getDescEn() .'</option>';
					} else if ($this->currentLanguage == CodeEo::$CODE_TYPE_LANGAUGE_LANG_TC){
						echo '<option value="' . $value->getCode() . '">' . $value->getDescTc() .'</option>';
					} else {
						echo '<option value="' . $value->getCode() . '">' . $value->getDescTc() .'</option>';
					}
				}
				echo '</select>';
				echo '<input type="hidden" class="movieClassInputControl" />';
			}
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->render() - ',$ex );
			throw $ex;
		}
	}
}
?>