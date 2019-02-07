<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLS_PATH . '/Control.php');
include_once( CONTROLLERS_PATH . '/Controller.php');
include_once( SOS_PATH . '/MovieWaitingSo.php');
include_once( EOS_PATH . '/MovieWaitingEo.php');
include_once( SERVICES_PATH . '/MovieWaitingMgr.php');
include_once( SERVICES_PATH . '/MovieMgr.php');
include_once( SERVICES_PATH . '/MovieTypeMgr.php');
class MovieWaitingControl extends Control{
	private $className;
	private $logger;
	private $userSessionVo;
	private $movieWaitingMgr;
	private $movieWaitingPageBundlesEo;
	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
		$this->movieWaitingPageBundlesEo = $this->bundlesFactory->getInstanceOfMovieWaitingPageBundlesEo();
	}

	private function init(){
		$this->movieWaitingMgr = new MovieWaitingMgr();
	}

	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	public function getMovieWaitingPageBundlesEo(){
		return $this->movieWaitingPageBundlesEo;
	}
	public function render(){
		try {
			$so = new MovieWaitingSo();
			$orderBySo = new OrderBySo();
			$orderBySo->setFieldName('waiting_seq');
			$orderBySo->setIsAsc(TRUE);
			$so->addOrderBySo($orderBySo);
			$movieWaitingVoArray = $this->movieWaitingMgr->selectVo($so);
			echo '<table class="moviewaitingtable">';
			echo '<thead>';
			echo '<tr>';
				echo '<th>';
				echo '';
				echo '</th>';
				echo '<th>';
				echo $this->movieWaitingPageBundlesEo->getSeq();
				echo '</th>';
				echo '<th>';
				echo $this->movieWaitingPageBundlesEo->getMovieTcName();
				echo '</th>';
				echo '<th>';
				echo $this->movieWaitingPageBundlesEo->getMovieEnName();
				echo '</th>';
				echo '<th>';
				echo $this->movieWaitingPageBundlesEo->getStatus();
				echo '</th>';
				echo '<th style="display:none">';
				echo $this->movieWaitingPageBundlesEo->getMovieId();
				echo '</th>';
			echo '</tr>';
			echo '</thead>';
			echo '<tbody>';
			echo '<tr>';
				echo '<td>';
				echo '<input type="button" class="smallbutton savebutton" onclick="saveMovieWaitingListButton_onclick(event)" />';
				echo '<input type="button" class="smallbutton add2button" onclick="addMovieWaitingListButton_onclick(event)" />';
				echo '</td>';

				echo '<td>';
				echo '<input type="text" class="waitingSeqInput moviewaitingseqinput" />';
				echo '</td>';
				echo '<td>';
				echo '<input type="text" class="movieNameTcInput movienameinput readonlygray"  readonly />';
				echo '</td>';
				echo '<td>';
				echo '<input type="text" class="movieNameEnInput movienameinput readonlygray"  readonly />';
				echo '</td>';
				echo '<td>';
				echo '<input type="text" class="statusStringInput statusstringinput readonlygray" readonly />';
				echo '<input type="hidden" class="statusInput statusinput readonlygray" readonly />';
				echo '</td>';
				echo '<td style="display:none">';
				echo '<input type="text" class="movieIdInput movieidinput readonlygray" readonly />';
				echo '<input type="text" class="IdInput idinput readonlygray" readonly />';
				echo '</td>';
				
				if (isset($movieWaitingVoArray)){
					foreach ($movieWaitingVoArray as $key=>$value){
						echo '<tr>';
							echo '<td>';
							echo '<input type="button" class="smallbutton deletebutton" onclick="delete_onclick(event)" />';
							echo '<input type="button" class="smallbutton moveupbutton" onclick="moveup_onclick(event)" />';
							echo '<input type="button" class="smallbutton movedownbutton" onclick="movedown_onclick(event)" />';
							echo '</td>';
							
							echo '<td>';
							echo '<input type="text" class="waitingSeqInput moviewaitingseqinput" value="' . $value->waitingSeq . '" onkeyup="movieWaitingSeqInput_onkeyup(event)" />';
							echo '</td>';
							echo '<td>';
							echo '<input type="text" class="movieNameTcInput movienameinput readonlygray" readonly value="' . $value->movieNameTc . '" />';
							echo '</td>';
							echo '<td>';
							echo '<input type="text" class="movieNameEnInput movienameinput readonlygray" readonly value="' . $value->movieNameEn . '" />';
							echo '</td>';
							echo '<td>';
							echo '<input type="text" class="statusStringInput statusstringinput readonlygray" readonly value="' . $value->statusString . '" />';
							echo '<input type="hidden" class="statusInput statusinput readonlygray" readonly value="' . $value->status. '" />';
							echo '</td>';
							echo '<td style="display:none">';
							echo '<input type="hidden" class="movieIdInput movieidinput readonlygray" readonly value="' . $value->movieId . '" />';
							echo '<input type="hidden" class="idInput idinput readonlygray" readonly value="' . $value->id . '" />';
							echo '<input type="hidden" class="createdByInput idinput readonlygray" readonly value="' . $value->createdBy . '" />';
							echo '<input type="hidden" class="updatedByInput idinput readonlygray" readonly value="' . $value->updatedBy . '" />';
							echo '</td>';
						echo '</tr>';
					}
				}
				
				
			echo '</tr>';
			
			// for loop
			// 				echo '<tr>';
			// 				echo '<td>';
			// 				echo '<input type="button" class="smallbutton moveupbutton" onclick="moveup_onclick(event)" />&nbsp;';
			// 				echo '<input type="button" class="smallbutton movedownbutton" onclick="movedown_onclick(event)" />';
			// 				echo '</td>';
			// 				echo '</tr>';
			echo '</tbody>';
			echo '</table>';
		} catch ( Exception $ex ) {
			$logger->error (BundlesFactory::getClassName() . '->render() - ',$ex );
			throw $ex;
		}
	}
}
?>