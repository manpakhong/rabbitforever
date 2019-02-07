<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( CONTROLS_PATH . '/Control.php');

class FileUploadControl extends Control{
	private $className;
	private $logger;
	private $upId;
	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
	}
	private function init(){
		$this->upId = uniqid();
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	public function render(){
		try {
			echo '<form action="../../../rabbitforever/commands/UploadFileCommand.php" method="post" enctype="multipart/form-data" name="fileUplodadForm" id="fileUploadForm" class="fileuploadform">';
			echo $this->commonPageBundlesEo->getChooseAFileToUpload() . '<br/>';
			echo '<input name="file" class="fileselect" type="file" id="file" size="2000" /><br/>';
			echo '<input name="Submit" type="submit" id="submit" class="submitinput" value="' . $this->commonPageBundlesEo->getSubmit().'" />';
			echo '</form>';
			echo '<div class="progressdiv">';
			echo '<div class="bardiv"></div>';
			echo '<div class="percentdiv">0%</div>';
			echo '</div>';
			echo '<div class="statusdiv"></div>';
			echo '<div class="fileuploaddiv">' . $this->commonPageBundlesEo->getFilesAdded() . ':<br/></div>';
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->render()' ,$ex );
			throw $ex;
		}
	}
}
?>