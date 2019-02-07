<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( SOS_PATH . '/MenuSo.php');
include_once( CONTROLS_PATH . '/Control.php');
include_once( VOS_PATH . '/UserSessionVo.php');


class UserSessionControl extends Control{
	private $className;
	private $logger;
	private $userSessionVo;
	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
	}
	
	private function init(){
		//unset($_SESSION['userSessionVo']);
		if (isset($_SESSION['userSessionVo'])){
			$this->userSessionVo = unserialize($_SESSION['userSessionVo']);
		}
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	public function render(){
		try {
			if (isset($this->userSessionVo)){
// 				print_r($this->userSessionVo);
				if (isset($this->userSessionVo->userVo)){
					$userVo = $this->userSessionVo->userVo;
					echo '<div class="usersessiondiv">';
					echo '<ul class="usersessionul">';
					echo '<li class="usersessionli">';
					echo '<a href="#" class="usersessionahref" onclick="username_click(event)">';
					if ($this->currentLanguage == CodeEo::$CODE_TYPE_LANGAUGE_LANG_TC){
						echo $userVo->userFullNameTc;
					}
					if ($this->currentLanguage == CodeEo::$CODE_TYPE_LANGAUGE_LANG_EN){
						echo $userVo->userFullNameEn;
					}

 					echo '</a>';
					echo '<input type="hidden" class="userNameInput" value="' . $userVo->userName . '" />';
					echo '</li>';
					echo '<li class="usersessionli">';
					echo '<a href="#" class="usersessionahref" onclick="logout_click(event)">';
					echo 'Logout';
					echo '</a>';
					echo '</li>';
					echo '</ul>';
					echo '</div>';
				}
			} 
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->render()' ,$ex );
			throw $ex;
		}
	}
	public function getUserVo(){
		return $this->userVo;
	}
	
	public function setUserVo($userVo){
		$this->userVo = $userVo;
	}
	public function getUserSessionVo(){
		return $this->userSessionVo;
	}
	
	public function setUserSessionVo($userSessionVo){
		$this->userSessionVo = $userSessionVo;
	}
}
?>