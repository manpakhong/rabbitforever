<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLS_PATH . '/Control.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once( SOS_PATH . '/CodeSo.php');
include_once ( EOS_PATH . '/CodeEo.php');
include_once( SERVICES_PATH . '/CodeMgr.php');
class LangSelectControl extends Control{
	private $className;
	private $logger;
	private $userSessionVo;
	private $codeMgr;
	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();

	}
	
	private function init(){
		$this->codeMgr = new CodeMgr();
		
	}

	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	public function render(){
		try {
			$so = new CodeSo();
			$codeType = CodeEo::$CODE_TYPE_LANGUAGE;
			$so->setCodeType($codeType);
			$codeEoArray = $this->codeMgr->select($so);
			if (isset($codeEoArray)){
				if (count($codeEoArray) > 0){
					echo '<div class="languagediv">';
					echo '<select class="languageselect" onchange="languageselect_onchange(event)">';
					foreach ($codeEoArray as $key=>$value){
						$code = $value->getCode();
						if ($this->currentLanguage == CodeEo::$CODE_TYPE_LANGAUGE_LANG_TC){
							if ($code == $this->currentLanguage){
								echo '<option value="' . $code . '" selected>' . $value->getDescTc() . '</option>';
							} else {
								echo '<option value="' . $code . '" >' . $value->getDescTc() . '</option>';
							}

						}
						if ($this->currentLanguage == CodeEo::$CODE_TYPE_LANGAUGE_LANG_EN){
							if ($code == $this->currentLanguage){
								echo '<option value="' . $code . '" selected>' . $value->getDescEn() . '</option>';
							} else {
								echo '<option value="' . $code . '">' . $value->getDescEn() . '</option>';
							}
						}
					}
					echo '</select>';
					echo '</div>';
				}

			}
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->render() - ',$ex );
			throw $ex;
		}
	}
}
?>