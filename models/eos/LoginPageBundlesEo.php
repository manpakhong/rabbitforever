<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( EOS_PATH . '/BundlesEo.php');
class LoginPageBundlesEo extends BundlesEo{
	private $loginEn;
	private $passwordEn;
	private $authorizedUserEn;
	private $loginSuccessEn;
	private $loginFailureEn;
	private $loginTc;
	private $passwordTc;
	private $authorizedUserTc;
	private $loginSuccessTc;
	private $loginFailureTc;
	public function __construct($defaultLang = NULL){
		parent::__construct($defaultLang);
	}
	public function setLoginEn($loginEn){
		$this->loginEn=$loginEn;
	}
	public function getLoginEn(){
		return $this->loginEn;
	}
	public function setPasswordEn($passwordEn){
		$this->passwordEn=$passwordEn;
	}
	public function getPasswordEn(){
		return $this->passwordEn;
	}
	public function setAuthorizedUserEn($authorizedUserEn){
		$this->authorizedUserEn=$authorizedUserEn;
	}
	public function getAuthorizedUserEn(){
		return $this->authorizedUserEn;
	}
	public function setLoginSuccessEn($loginSuccessEn){
		$this->loginSuccessEn=$loginSuccessEn;
	}
	public function getLoginSuccessEn(){
		return $this->loginSuccessEn;
	}
	public function setLoginFailureEn($loginFailureEn){
		$this->loginFailureEn=$loginFailureEn;
	}
	public function getLoginFailureEn(){
		return $this->loginFailureEn;
	}
	public function setLoginTc($loginTc){
		$this->loginTc=$loginTc;
	}
	public function getLoginTc(){
		return $this->loginTc;
	}
	public function setPasswordTc($passwordTc){
		$this->passwordTc=$passwordTc;
	}
	public function getPasswordTc(){
		return $this->passwordTc;
	}
	public function setAuthorizedUserTc($authorizedUserTc){
		$this->authorizedUserTc=$authorizedUserTc;
	}
	public function getAuthorizedUserTc(){
		return $this->authorizedUserTc;
	}
	public function setLoginSuccessTc($loginSuccessTc){
		$this->loginSuccessTc=$loginSuccessTc;
	}
	public function getLoginSuccessTc(){
		return $this->loginSuccessTc;
	}
	public function setLoginFailureTc($loginFailureTc){
		$this->loginFailureTc=$loginFailureTc;
	}
	public function getLoginFailureTc(){
		return $this->loginFailureTc;
	}
	public function getLogin(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getLoginTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getLoginEn();
		} else {
			$property = $this->getLoginEn();
		}
		return $property;
	}
	public function getPassword(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getPasswordTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getPasswordEn();
		} else {
			$property = $this->getPasswordEn();
		}
		return $property;
	}
	public function getAuthorizedUser(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getAuthorizedUserTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getAuthorizedUserEn();
		} else {
			$property = $this->getAuthorizedUserEn();
		}
		return $property;
	}
	public function getLoginSuccess(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getLoginSuccessTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getLoginSuccessEn();
		} else {
			$property = $this->getLoginSuccessEn();
		}
		return $property;
	}
	public function getLoginFailure(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getLoginFailureTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getLoginFailureEn();
		} else {
			$property = $this->getLoginFailureEn();
		}
		return $property;
	}
	public function __toString(){
		$objectString=NULL;
		$count = 0;
		foreach($this as $key => $value){
			if($count > 0){
				$objString = $objectString . ',';
			}
			$objectString = $objectString . '$key => $value ';
			$count = $count + 1;
		}
		return $objectString;
	}
}
?>