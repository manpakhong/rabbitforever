<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( DAOS_PATH . '/Dao.php');
include_once (BUILDERS_PATH . '/BundlesBuilder.php');
include_once (EOS_PATH . '/SystemConfigEo.php');
include_once (EOS_PATH . '/LoginPageBundlesEo.php');
class LoginPageBundlesBuilder extends BundlesBuilder{
	private $className;
	private $logger;
	public function __construct($fileName, $bundle = NULL){
		parent::__construct($fileName, $bundle);
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger(get_class($this));
		if ($this->bundle === NULL){
			$this->bundle = new LoginPageBundlesEo();
		}
	}
	private function init(){
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className =  __CLASS__;
		}
	}
	public function buildBundle(){
		$bundleEo = NULL;
		try{
			$fileContent = $this->fileUtils->readTextFile($this->fileName);
			$propertyArray = $this->bundleUtils->parseProperties($fileContent);
			if (isset($propertyArray)){
				$bundleEo = new LoginPageBundlesEo($this->defaultLanguage);
				$loginEn=$propertyArray['login.en'];
				$passwordEn=$propertyArray['password.en'];
				$authorizedUserEn=$propertyArray['authorized_user.en'];
				$loginSuccessEn=$propertyArray['login_success.en'];
				$loginFailureEn=$propertyArray['login_failure.en'];
				$loginTc=$propertyArray['login.tc'];
				$passwordTc=$propertyArray['password.tc'];
				$authorizedUserTc=$propertyArray['authorized_user.tc'];
				$loginSuccessTc=$propertyArray['login_success.tc'];
				$loginFailureTc=$propertyArray['login_failure.tc'];
				if(isset($loginEn)){
					$bundleEo->setLoginEn(trim($loginEn));
				}
				if(isset($passwordEn)){
					$bundleEo->setPasswordEn(trim($passwordEn));
				}
				if(isset($authorizedUserEn)){
					$bundleEo->setAuthorizedUserEn(trim($authorizedUserEn));
				}
				if(isset($loginSuccessEn)){
					$bundleEo->setLoginSuccessEn(trim($loginSuccessEn));
				}
				if(isset($loginFailureEn)){
					$bundleEo->setLoginFailureEn(trim($loginFailureEn));
				}
				if(isset($loginTc)){
					$bundleEo->setLoginTc(trim($loginTc));
				}
				if(isset($passwordTc)){
					$bundleEo->setPasswordTc(trim($passwordTc));
				}
				if(isset($authorizedUserTc)){
					$bundleEo->setAuthorizedUserTc(trim($authorizedUserTc));
				}
				if(isset($loginSuccessTc)){
					$bundleEo->setLoginSuccessTc(trim($loginSuccessTc));
				}
				if(isset($loginFailureTc)){
					$bundleEo->setLoginFailureTc(trim($loginFailureTc));
				}
			}
		} catch (Exception $ex) {
			$this->logger->error($this->className . '->buildBundle() - $this->fileName=' . print_r($this->fileName, 1), $ex );
			throw $ex;
		}
		$this->bundleEo = $bundleEo;
	}
}
?>