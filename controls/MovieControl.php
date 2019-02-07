<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLS_PATH . '/Control.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once( SOS_PATH . '/MovieSo.php');
include_once ( EOS_PATH . '/MovieEo.php');
include_once ( EOS_PATH . '/CodeEo.php');
include_once( SERVICES_PATH . '/MovieMgr.php');
include_once( SERVICES_PATH . '/MovieTypeMgr.php');
include_once( SERVICES_PATH . '/CodeMgr.php');
include_once ( SOS_PATH . '/MovieTypeSo.php');
include_once ( SOS_PATH . '/CodeSo.php');
class MovieControl extends Control{
	private $className;
	private $logger;
	private $userSessionVo;
	private $movieMgr;
	private $movieTypeMgr;
	private $codeMgr;
	private $movieTypeArray;
	private $movieClassArray;
	private $moviePageBundlesEo;
	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
		$this->moviePageBundlesEo = $this->bundlesFactory->getInstanceOfMoviePageBundlesEo();
	}
	
	private function init(){
		try {
			$this->movieMgr = new MovieMgr();
			$this->movieTypeMgr = new MovieTypeMgr();
			$this->codeMgr = new CodeMgr();
			$movieTypeSo = new MovieTypeSo();
			$this->movieTypeArray = $this->movieTypeMgr->select($movieTypeSo);
			$codeSo = new CodeSo();
			$codeSo->setCodeType(CodeEo::$CODE_TYPE_MOVIE_CLASS);
			$this->movieClassArray = $this->codeMgr->select($codeSo);
			
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
			$so = new MovieSo();
			echo '<form class="movieeditform" method="post" action="submit.action">';
			echo '<fieldset class="moviefieldset">';
			echo '<table class="movietable">';
			
			echo '<tr>';
			echo '<td class="headerTd">';
			echo $this->moviePageBundlesEo->getMovieEnName();
			echo '</td>';
			echo '<td class="inputTd">';
			echo '<input type="text" class="movieNameEnForm movieinputform lookupInput" onchange="movieEnNameFormInput_onchange(event)" />';
			echo '<td class="buttonTd">';
			echo '<span class="lookupIconButtonSpan">';
			echo '<input type="button" class="smallbutton lookupbutton lookupIconButton" onclick="lookupButton_onclick(event)"  />';
			echo '</div>';
			echo '</td>';
			echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
			echo '<td class="headerTd">';
			echo $this->moviePageBundlesEo->getMovieTcName();
			echo '</td>';
			echo '<td class="inputTd">';
			echo '<input type="text" class="movieNameTcForm movieinputform lookupInput" onchange="movieTcNameFormInput_onchange(event)" />';
			echo '</td>';
			echo '<td class="buttonTd">';
			
			echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
			echo '<td class="headerTd">';
			echo $this->moviePageBundlesEo->getMovieType();
			echo '</td>';
			echo '<td class="inputTd">';

			echo '<select class="movieTypeSelectForm movieinputform" onchange="movieTypeSelectForm_onchange(event)">';
			echo '<option value="" selected>' . '</option>';
			$firstMovieTypeValue = '';
			$count = 0;
			if (isset($this->movieTypeArray)){
				foreach ($this->movieTypeArray as $key=>$value){
					if ($count == 0){
						$firstMovieTypeValue = $value->getMovieTypeId();
					}
					if ($this->currentLanguage == CodeEo::$CODE_TYPE_LANGAUGE_LANG_EN){
						echo '<option value="' . $value->getMovieTypeId() . '">' . $value->getMovieTypeDescEn() .'</option>';
					} else if ($this->currentLanguage == CodeEo::$CODE_TYPE_LANGAUGE_LANG_TC){
						echo '<option value="' . $value->getMovieTypeId() . '">' . $value->getMovieTypeDescTc() .'</option>';
					} else {
						echo '<option value="' . $value->getMovieTypeId() . '">' . $value->getMovieTypeDescEn() .'</option>';
					}
					$count = $count + 1;
				}
			} 
			echo '</select>';
			
			echo '<input type="hidden" class="movieTypeForm movieinputform" value="' . '' . '"/>';
			echo '</td>';
			echo '<td class="buttonTd">';
			
			echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
			echo '<td class="headerTd">';
			echo $this->moviePageBundlesEo->getClass();
			echo '</td>';
			echo '<td class="inputTd">';
			
			
			echo '<select class="movieClassSelectForm movieinputform" onchange="movieClassSelectForm_onchange(event)">';
			echo '<option value="" selected>' . '</option>';
			$count = 0;
			$firstMovieClassCode = '';
			if (isset($this->movieClassArray)){
				foreach ($this->movieClassArray as $key=>$value){
					$firstMovieClassCode = $value->getCode();
					if ($this->currentLanguage == CodeEo::$CODE_TYPE_LANGAUGE_LANG_EN){
						echo '<option value="' . $value->getCode() . '">' . $value->getDescEn() .'</option>';
					} else if ($this->currentLanguage == CodeEo::$CODE_TYPE_LANGAUGE_LANG_TC){
						echo '<option value="' . $value->getCode() . '">' . $value->getDescTc() .'</option>';
					} else {
						echo '<option value="' . $value->getCode() . '">' . $value->getDescTc() .'</option>';
					}
					$count = $count + 1;
				}
			}
			echo '</select>';
			
			
			echo '<input type="hidden" class="movieClassForm movieinputform" value="'. '' .'" />';
			echo '</td>';
			echo '<td class="buttonTd">';
			
			echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
			echo '<td class="headerTd">';
			echo $this->moviePageBundlesEo->getRemarks();
			echo '</td>';
			echo '<td class="inputTd">';
			echo '<input type="text" class="remarksForm movieinputform" />';
			echo '</td>';
			echo '<td class="buttonTd">';
			
			echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
			echo '<td class="headerTd">';
			echo $this->moviePageBundlesEo->getMoviePic();
			echo '</td>';
			echo '<td class="inputTd">';
			echo '<input type="text" class="moviePic1Form movieinputform" onchange="moviePic1Input_onchange(event)"/>';
			echo '<br/>';
			echo '<img class="moviePic1Img" src="" alt="' . $this->moviePageBundlesEo->getWaitingPathInput() . '"/>';
			echo '</td>';
			echo '<td class="buttonTd">';
			echo '<input type="button" class="smallbutton refreshiconbutton refreshiconbuttonMovie" onclick="refreshMoviePic1_onclick(event)"  />';
			echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
			echo '<td class="headerTd">';
			echo $this->moviePageBundlesEo->getMoviePic();
			echo '</td>';
			echo '<td class="inputTd">';
			echo '<input type="text" class="moviePic2Form movieinputform" onchange="moviePic2Input_onchange(event)"/>';
			echo '<br/>';
			echo '<img class="moviePic2Img" src="" alt="' . $this->moviePageBundlesEo->getWaitingPathInput() . '"/>';
			echo '</td>';
			echo '<td class="buttonTd">';
			echo '<input type="button" class="smallbutton refreshiconbutton refreshiconbuttonMovie" onclick="refreshMoviePic2_onclick(event)"  />';
			echo '</td>';
			echo '</tr>';
			
			echo '<tr style="display:none">';
			echo '<td class="headerTd">';
// 			echo $this->moviePageBundlesEo->getRemarks();
			echo '</td>';
			echo '<td class="inputTd">';
			echo '<input type="hidden" class="movieIdForm movieinputform" />';
			echo '<input type="hidden" class="createdByForm movieinputform" />';
			echo '<input type="hidden" class="updatedByForm movieinputform" />';
			echo '<input type="hidden" class="createdDateForm movieinputform" />';
			echo '<input type="hidden" class="updatedDateForm movieinputform" />';
			echo '</td>';
			echo '<td class="buttonTd">';
			
			echo '</td>';
			echo '</tr>';
			
			echo '</table>';
			echo '</fieldset>';
			echo '</form>';
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->render() - ',$ex );
			throw $ex;
		}
	}
}
?>