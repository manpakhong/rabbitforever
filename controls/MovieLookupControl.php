<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLS_PATH . '/Control.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once( SOS_PATH . '/MovieSo.php');
include_once( EOS_PATH . '/MovieEo.php');
include_once( SERVICES_PATH . '/MovieMgr.php');
include_once( SERVICES_PATH . '/MovieTypeMgr.php');
include_once( CONTROLS_PATH . '/MovieTypeControl.php');
include_once( CONTROLS_PATH . '/MovieClassControl.php');
class MovieLookupControl extends Control{
	private $className;
	private $logger;
	private $userSessionVo;
	private $movieLookupPageBundlesEo;
	private $movieTypeControl;
	private $movieClassControl;
	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
		$this->movieLookupPageBundlesEo = $this->bundlesFactory->getInstanceOfMovieLookupPageBundlesEo();
	}
	
	private function init(){
		$this->movieTypeControl =new MovieTypeControl();
		$this->movieClassControl = new MovieClassControl();
	}
	
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	
	public function render(){
		try {
			echo '<form>';
			echo '<fieldset>';
			echo '<legend>'. $this->movieLookupPageBundlesEo->getSearchCriteria() .'</legend>';
			echo '<table class="criteriaTable">';
			echo '<tr>';
				echo '<td class="labelTd">';
				echo  $this->movieLookupPageBundlesEo->getMovieTcName();
				echo '</td>';
				echo '<td class="dataTd">';
				echo '<input type="text" class="movieTcNameInputLu lookupInput" onchange="movieTcNameInput_onchange(event)" />';
				echo '</td>';
				echo '<td class="buttonTd">';
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td class="labelTd">';
				echo  $this->movieLookupPageBundlesEo->getMovieEnName();
				echo '</td>';
				echo '<td class="dataTd">';
				echo '<input type="text" class="movieEnNameInputLu lookupInput" onchange="movieEnNameInput_onchange(event)" />';
				echo '</td>';
				echo '<td class="buttonTd">';
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td class="labelTd">';
				echo  $this->movieLookupPageBundlesEo->getClass();
				echo '</td>';
				echo '<td class="dataTd">';
				echo $this->movieClassControl->render();
				echo '</td>';
				echo '<td class="buttonTd">';
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td class="labelTd">';
				echo  $this->movieLookupPageBundlesEo->getMovieType();
				echo '</td>';
				echo '<td class="dataTd">';
				echo $this->movieTypeControl->render();
				echo '</td>';
				echo '<td class="buttonTd">';
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td class="labelTd">';
				echo '</td>';
				echo '<td class="dataTd">';
				echo '</td>';
				echo '<td class="buttonTd">';
				echo '<input class="refreshInput" onclick="refreshInput_onclick(event)" type="button" value="' .  $this->movieLookupPageBundlesEo->getRefresh() .'" />';
				echo '</td>';
			echo '</tr>';
			echo '</table>';
			echo '</fieldset>';
			echo '</form>';
			
			echo '<table class="movieLookupTable">';
			echo '<thead>';
			echo '<tr>';
				echo '<th class="nonDisplayTableColumn">';
				echo $this->movieLookupPageBundlesEo->getId();
				echo '</th>';
				echo '<th>';
				echo $this->movieLookupPageBundlesEo->getMovieEnName();
				echo '</th>';
				echo '<th>';
				echo $this->movieLookupPageBundlesEo->getMovieTcName();
				echo '</th>';
				echo '<th>';
				echo $this->movieLookupPageBundlesEo->getMovieType();
				echo '</th>';
				echo '<th>';
				echo $this->movieLookupPageBundlesEo->getClass();
				echo '</th>';
				echo '<th>';
				echo $this->movieLookupPageBundlesEo->getMovieCover();
				echo '</th>';
				echo '<th>';
				echo $this->movieLookupPageBundlesEo->getMoviePic();
				echo '</th>';
				echo '<th>';
				echo $this->movieLookupPageBundlesEo->getTrailor();
				echo '</th>';
				echo '<th class="nonDisplayTableColumn">';
				echo $this->movieLookupPageBundlesEo->getCreatedBy();
				echo '</th>';
				echo '<th>';
				echo $this->movieLookupPageBundlesEo->getUpdatedBy();
				echo '</th>';
				echo '<th class="nonDisplayTableColumn">';
				echo $this->movieLookupPageBundlesEo->getCreatedDate();
				echo '</th>';
				echo '<th>';
				echo $this->movieLookupPageBundlesEo->getUpdatedDate();
				echo '</th>';
				echo '<th>';
				echo $this->movieLookupPageBundlesEo->getRemarks();
				echo '</th>';
			echo '</tr>';
			echo '</thead>';
			echo '<tbody>';
			echo '<tr>';
			echo '<td colspan="13">' . $this->commonPageBundlesEo->getNoRecordFound() .'</td>';
			echo '</tr>';
			/*
			echo '<tr>';
				echo '<td class="nonDisplayTableColumn">';
				echo '</td>';
				echo '<td>';
				echo '</td>';
				echo '<td>';
				echo '</td>';
				echo '<td>';
				echo '</td>';
				echo '<td>';
				echo '</td>';
				echo '<td>';
				echo '</td>';
				echo '<td>';
				echo '</td>';
				echo '<td>';
				echo '</td>';
				echo '<td class="nonDisplayTableColumn">';
				echo '</td>';
				echo '<td>';
				echo '</td>';
				echo '<td class="nonDisplayTableColumn">';
				echo '</td>';
				echo '<td>';
				echo '</td>';
				echo '<td>';
				echo '</td>';
			echo '</tr>';
			*/
			echo '</tbody>';
			echo '</table>';
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->render() - ',$ex );
			throw $ex;
		}
	}
}
?>