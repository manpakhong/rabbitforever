<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( EOS_PATH . '/BundlesEo.php');
class CommonPageBundlesEo extends BundlesEo{
	private $submitEn;
	private $saveSuccessfullyEn;
	private $saveFailureEn;
	private $deletionConfirmationEn;
	private $deleteSuccessfullyEn;
	private $deleteFailureEn;
	private $noRecordFoundEn;
	private $userDoesNotHaveRightEn;
	private $areYouSureEn;
	private $saveEn;
	private $loginSuccessfullyEn;
	private $loginFailedEn;
	private $logoutSuccessfullyEn;
	private $logoutFailedEn;
	private $abnormalNullableDataReturnEn;
	private $yesEn;
	private $noEn;
	private $selectEn;
	private $closeEn;
	private $cancelEn;
	private $chooseAFileToUploadEn;
	private $browseFilesEn;
	private $filesAddedEn;
	private $dataSaveConfirmationEn;
	private $isRequiredEn;
	private $userDoesNotLoginEn;
	private $userSessionTimeOutEn;
	private $submitTc;
	private $saveSuccessfullyTc;
	private $saveFailureTc;
	private $deletionConfirmationTc;
	private $deleteSuccessfullyTc;
	private $deleteFailureTc;
	private $noRecordFoundTc;
	private $userDoesNotHaveRightTc;
	private $areYouSureTc;
	private $saveTc;
	private $loginSuccessfullyTc;
	private $loginFailedTc;
	private $logoutSuccessfullyTc;
	private $logoutFailedTc;
	private $abnormalNullableDataReturnTc;
	private $yesTc;
	private $noTc;
	private $selectTc;
	private $closeTc;
	private $cancelTc;
	private $chooseAFileToUploadTc;
	private $browseFilesTc;
	private $filesAddedTc;
	private $dataSaveConfirmationTc;
	private $isRequiredTc;
	private $userDoesNotLoginTc;
	private $userSessionTimeOutTc;
	public function __construct($defaultLang = NULL){
		parent::__construct($defaultLang);
	}
	public function setSubmitEn($submitEn){
		$this->submitEn=$submitEn;
	}
	public function getSubmitEn(){
		return $this->submitEn;
	}
	public function setSaveSuccessfullyEn($saveSuccessfullyEn){
		$this->saveSuccessfullyEn=$saveSuccessfullyEn;
	}
	public function getSaveSuccessfullyEn(){
		return $this->saveSuccessfullyEn;
	}
	public function setSaveFailureEn($saveFailureEn){
		$this->saveFailureEn=$saveFailureEn;
	}
	public function getSaveFailureEn(){
		return $this->saveFailureEn;
	}
	public function setDeletionConfirmationEn($deletionConfirmationEn){
		$this->deletionConfirmationEn=$deletionConfirmationEn;
	}
	public function getDeletionConfirmationEn(){
		return $this->deletionConfirmationEn;
	}
	public function setDeleteSuccessfullyEn($deleteSuccessfullyEn){
		$this->deleteSuccessfullyEn=$deleteSuccessfullyEn;
	}
	public function getDeleteSuccessfullyEn(){
		return $this->deleteSuccessfullyEn;
	}
	public function setDeleteFailureEn($deleteFailureEn){
		$this->deleteFailureEn=$deleteFailureEn;
	}
	public function getDeleteFailureEn(){
		return $this->deleteFailureEn;
	}
	public function setNoRecordFoundEn($noRecordFoundEn){
		$this->noRecordFoundEn=$noRecordFoundEn;
	}
	public function getNoRecordFoundEn(){
		return $this->noRecordFoundEn;
	}
	public function setUserDoesNotHaveRightEn($userDoesNotHaveRightEn){
		$this->userDoesNotHaveRightEn=$userDoesNotHaveRightEn;
	}
	public function getUserDoesNotHaveRightEn(){
		return $this->userDoesNotHaveRightEn;
	}
	public function setAreYouSureEn($areYouSureEn){
		$this->areYouSureEn=$areYouSureEn;
	}
	public function getAreYouSureEn(){
		return $this->areYouSureEn;
	}
	public function setSaveEn($saveEn){
		$this->saveEn=$saveEn;
	}
	public function getSaveEn(){
		return $this->saveEn;
	}
	public function setLoginSuccessfullyEn($loginSuccessfullyEn){
		$this->loginSuccessfullyEn=$loginSuccessfullyEn;
	}
	public function getLoginSuccessfullyEn(){
		return $this->loginSuccessfullyEn;
	}
	public function setLoginFailedEn($loginFailedEn){
		$this->loginFailedEn=$loginFailedEn;
	}
	public function getLoginFailedEn(){
		return $this->loginFailedEn;
	}
	public function setLogoutSuccessfullyEn($logoutSuccessfullyEn){
		$this->logoutSuccessfullyEn=$logoutSuccessfullyEn;
	}
	public function getLogoutSuccessfullyEn(){
		return $this->logoutSuccessfullyEn;
	}
	public function setLogoutFailedEn($logoutFailedEn){
		$this->logoutFailedEn=$logoutFailedEn;
	}
	public function getLogoutFailedEn(){
		return $this->logoutFailedEn;
	}
	public function setAbnormalNullableDataReturnEn($abnormalNullableDataReturnEn){
		$this->abnormalNullableDataReturnEn=$abnormalNullableDataReturnEn;
	}
	public function getAbnormalNullableDataReturnEn(){
		return $this->abnormalNullableDataReturnEn;
	}
	public function setYesEn($yesEn){
		$this->yesEn=$yesEn;
	}
	public function getYesEn(){
		return $this->yesEn;
	}
	public function setNoEn($noEn){
		$this->noEn=$noEn;
	}
	public function getNoEn(){
		return $this->noEn;
	}
	public function setSelectEn($selectEn){
		$this->selectEn=$selectEn;
	}
	public function getSelectEn(){
		return $this->selectEn;
	}
	public function setCloseEn($closeEn){
		$this->closeEn=$closeEn;
	}
	public function getCloseEn(){
		return $this->closeEn;
	}
	public function setCancelEn($cancelEn){
		$this->cancelEn=$cancelEn;
	}
	public function getCancelEn(){
		return $this->cancelEn;
	}
	public function setChooseAFileToUploadEn($chooseAFileToUploadEn){
		$this->chooseAFileToUploadEn=$chooseAFileToUploadEn;
	}
	public function getChooseAFileToUploadEn(){
		return $this->chooseAFileToUploadEn;
	}
	public function setBrowseFilesEn($browseFilesEn){
		$this->browseFilesEn=$browseFilesEn;
	}
	public function getBrowseFilesEn(){
		return $this->browseFilesEn;
	}
	public function setFilesAddedEn($filesAddedEn){
		$this->filesAddedEn=$filesAddedEn;
	}
	public function getFilesAddedEn(){
		return $this->filesAddedEn;
	}
	public function setDataSaveConfirmationEn($dataSaveConfirmationEn){
		$this->dataSaveConfirmationEn=$dataSaveConfirmationEn;
	}
	public function getDataSaveConfirmationEn(){
		return $this->dataSaveConfirmationEn;
	}
	public function setIsRequiredEn($isRequiredEn){
		$this->isRequiredEn=$isRequiredEn;
	}
	public function getIsRequiredEn(){
		return $this->isRequiredEn;
	}
	public function setUserDoesNotLoginEn($userDoesNotLoginEn){
		$this->userDoesNotLoginEn=$userDoesNotLoginEn;
	}
	public function getUserDoesNotLoginEn(){
		return $this->userDoesNotLoginEn;
	}
	public function setUserSessionTimeOutEn($userSessionTimeOutEn){
		$this->userSessionTimeOutEn=$userSessionTimeOutEn;
	}
	public function getUserSessionTimeOutEn(){
		return $this->userSessionTimeOutEn;
	}
	public function setSubmitTc($submitTc){
		$this->submitTc=$submitTc;
	}
	public function getSubmitTc(){
		return $this->submitTc;
	}
	public function setSaveSuccessfullyTc($saveSuccessfullyTc){
		$this->saveSuccessfullyTc=$saveSuccessfullyTc;
	}
	public function getSaveSuccessfullyTc(){
		return $this->saveSuccessfullyTc;
	}
	public function setSaveFailureTc($saveFailureTc){
		$this->saveFailureTc=$saveFailureTc;
	}
	public function getSaveFailureTc(){
		return $this->saveFailureTc;
	}
	public function setDeletionConfirmationTc($deletionConfirmationTc){
		$this->deletionConfirmationTc=$deletionConfirmationTc;
	}
	public function getDeletionConfirmationTc(){
		return $this->deletionConfirmationTc;
	}
	public function setDeleteSuccessfullyTc($deleteSuccessfullyTc){
		$this->deleteSuccessfullyTc=$deleteSuccessfullyTc;
	}
	public function getDeleteSuccessfullyTc(){
		return $this->deleteSuccessfullyTc;
	}
	public function setDeleteFailureTc($deleteFailureTc){
		$this->deleteFailureTc=$deleteFailureTc;
	}
	public function getDeleteFailureTc(){
		return $this->deleteFailureTc;
	}
	public function setNoRecordFoundTc($noRecordFoundTc){
		$this->noRecordFoundTc=$noRecordFoundTc;
	}
	public function getNoRecordFoundTc(){
		return $this->noRecordFoundTc;
	}
	public function setUserDoesNotHaveRightTc($userDoesNotHaveRightTc){
		$this->userDoesNotHaveRightTc=$userDoesNotHaveRightTc;
	}
	public function getUserDoesNotHaveRightTc(){
		return $this->userDoesNotHaveRightTc;
	}
	public function setAreYouSureTc($areYouSureTc){
		$this->areYouSureTc=$areYouSureTc;
	}
	public function getAreYouSureTc(){
		return $this->areYouSureTc;
	}
	public function setSaveTc($saveTc){
		$this->saveTc=$saveTc;
	}
	public function getSaveTc(){
		return $this->saveTc;
	}
	public function setLoginSuccessfullyTc($loginSuccessfullyTc){
		$this->loginSuccessfullyTc=$loginSuccessfullyTc;
	}
	public function getLoginSuccessfullyTc(){
		return $this->loginSuccessfullyTc;
	}
	public function setLoginFailedTc($loginFailedTc){
		$this->loginFailedTc=$loginFailedTc;
	}
	public function getLoginFailedTc(){
		return $this->loginFailedTc;
	}
	public function setLogoutSuccessfullyTc($logoutSuccessfullyTc){
		$this->logoutSuccessfullyTc=$logoutSuccessfullyTc;
	}
	public function getLogoutSuccessfullyTc(){
		return $this->logoutSuccessfullyTc;
	}
	public function setLogoutFailedTc($logoutFailedTc){
		$this->logoutFailedTc=$logoutFailedTc;
	}
	public function getLogoutFailedTc(){
		return $this->logoutFailedTc;
	}
	public function setAbnormalNullableDataReturnTc($abnormalNullableDataReturnTc){
		$this->abnormalNullableDataReturnTc=$abnormalNullableDataReturnTc;
	}
	public function getAbnormalNullableDataReturnTc(){
		return $this->abnormalNullableDataReturnTc;
	}
	public function setYesTc($yesTc){
		$this->yesTc=$yesTc;
	}
	public function getYesTc(){
		return $this->yesTc;
	}
	public function setNoTc($noTc){
		$this->noTc=$noTc;
	}
	public function getNoTc(){
		return $this->noTc;
	}
	public function setSelectTc($selectTc){
		$this->selectTc=$selectTc;
	}
	public function getSelectTc(){
		return $this->selectTc;
	}
	public function setCloseTc($closeTc){
		$this->closeTc=$closeTc;
	}
	public function getCloseTc(){
		return $this->closeTc;
	}
	public function setCancelTc($cancelTc){
		$this->cancelTc=$cancelTc;
	}
	public function getCancelTc(){
		return $this->cancelTc;
	}
	public function setChooseAFileToUploadTc($chooseAFileToUploadTc){
		$this->chooseAFileToUploadTc=$chooseAFileToUploadTc;
	}
	public function getChooseAFileToUploadTc(){
		return $this->chooseAFileToUploadTc;
	}
	public function setBrowseFilesTc($browseFilesTc){
		$this->browseFilesTc=$browseFilesTc;
	}
	public function getBrowseFilesTc(){
		return $this->browseFilesTc;
	}
	public function setFilesAddedTc($filesAddedTc){
		$this->filesAddedTc=$filesAddedTc;
	}
	public function getFilesAddedTc(){
		return $this->filesAddedTc;
	}
	public function setDataSaveConfirmationTc($dataSaveConfirmationTc){
		$this->dataSaveConfirmationTc=$dataSaveConfirmationTc;
	}
	public function getDataSaveConfirmationTc(){
		return $this->dataSaveConfirmationTc;
	}
	public function setIsRequiredTc($isRequiredTc){
		$this->isRequiredTc=$isRequiredTc;
	}
	public function getIsRequiredTc(){
		return $this->isRequiredTc;
	}
	public function setUserDoesNotLoginTc($userDoesNotLoginTc){
		$this->userDoesNotLoginTc=$userDoesNotLoginTc;
	}
	public function getUserDoesNotLoginTc(){
		return $this->userDoesNotLoginTc;
	}
	public function setUserSessionTimeOutTc($userSessionTimeOutTc){
		$this->userSessionTimeOutTc=$userSessionTimeOutTc;
	}
	public function getUserSessionTimeOutTc(){
		return $this->userSessionTimeOutTc;
	}
	public function getSubmit(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getSubmitTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getSubmitEn();
		} else {
			$property = $this->getSubmitEn();
		}
		return $property;
	}
	public function getSaveSuccessfully(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getSaveSuccessfullyTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getSaveSuccessfullyEn();
		} else {
			$property = $this->getSaveSuccessfullyEn();
		}
		return $property;
	}
	public function getSaveFailure(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getSaveFailureTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getSaveFailureEn();
		} else {
			$property = $this->getSaveFailureEn();
		}
		return $property;
	}
	public function getDeletionConfirmation(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getDeletionConfirmationTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getDeletionConfirmationEn();
		} else {
			$property = $this->getDeletionConfirmationEn();
		}
		return $property;
	}
	public function getDeleteSuccessfully(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getDeleteSuccessfullyTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getDeleteSuccessfullyEn();
		} else {
			$property = $this->getDeleteSuccessfullyEn();
		}
		return $property;
	}
	public function getDeleteFailure(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getDeleteFailureTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getDeleteFailureEn();
		} else {
			$property = $this->getDeleteFailureEn();
		}
		return $property;
	}
	public function getNoRecordFound(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getNoRecordFoundTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getNoRecordFoundEn();
		} else {
			$property = $this->getNoRecordFoundEn();
		}
		return $property;
	}
	public function getUserDoesNotHaveRight(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getUserDoesNotHaveRightTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getUserDoesNotHaveRightEn();
		} else {
			$property = $this->getUserDoesNotHaveRightEn();
		}
		return $property;
	}
	public function getAreYouSure(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getAreYouSureTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getAreYouSureEn();
		} else {
			$property = $this->getAreYouSureEn();
		}
		return $property;
	}
	public function getSave(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getSaveTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getSaveEn();
		} else {
			$property = $this->getSaveEn();
		}
		return $property;
	}
	public function getLoginSuccessfully(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getLoginSuccessfullyTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getLoginSuccessfullyEn();
		} else {
			$property = $this->getLoginSuccessfullyEn();
		}
		return $property;
	}
	public function getLoginFailed(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getLoginFailedTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getLoginFailedEn();
		} else {
			$property = $this->getLoginFailedEn();
		}
		return $property;
	}
	public function getLogoutSuccessfully(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getLogoutSuccessfullyTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getLogoutSuccessfullyEn();
		} else {
			$property = $this->getLogoutSuccessfullyEn();
		}
		return $property;
	}
	public function getLogoutFailed(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getLogoutFailedTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getLogoutFailedEn();
		} else {
			$property = $this->getLogoutFailedEn();
		}
		return $property;
	}
	public function getAbnormalNullableDataReturn(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getAbnormalNullableDataReturnTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getAbnormalNullableDataReturnEn();
		} else {
			$property = $this->getAbnormalNullableDataReturnEn();
		}
		return $property;
	}
	public function getYes(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getYesTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getYesEn();
		} else {
			$property = $this->getYesEn();
		}
		return $property;
	}
	public function getNo(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getNoTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getNoEn();
		} else {
			$property = $this->getNoEn();
		}
		return $property;
	}
	public function getSelect(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getSelectTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getSelectEn();
		} else {
			$property = $this->getSelectEn();
		}
		return $property;
	}
	public function getClose(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getCloseTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getCloseEn();
		} else {
			$property = $this->getCloseEn();
		}
		return $property;
	}
	public function getCancel(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getCancelTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getCancelEn();
		} else {
			$property = $this->getCancelEn();
		}
		return $property;
	}
	public function getChooseAFileToUpload(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getChooseAFileToUploadTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getChooseAFileToUploadEn();
		} else {
			$property = $this->getChooseAFileToUploadEn();
		}
		return $property;
	}
	public function getBrowseFiles(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getBrowseFilesTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getBrowseFilesEn();
		} else {
			$property = $this->getBrowseFilesEn();
		}
		return $property;
	}
	public function getFilesAdded(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getFilesAddedTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getFilesAddedEn();
		} else {
			$property = $this->getFilesAddedEn();
		}
		return $property;
	}
	public function getDataSaveConfirmation(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getDataSaveConfirmationTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getDataSaveConfirmationEn();
		} else {
			$property = $this->getDataSaveConfirmationEn();
		}
		return $property;
	}
	public function getIsRequired(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getIsRequiredTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getIsRequiredEn();
		} else {
			$property = $this->getIsRequiredEn();
		}
		return $property;
	}
	public function getUserDoesNotLogin(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getUserDoesNotLoginTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getUserDoesNotLoginEn();
		} else {
			$property = $this->getUserDoesNotLoginEn();
		}
		return $property;
	}
	public function getUserSessionTimeOut(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getUserSessionTimeOutTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getUserSessionTimeOutEn();
		} else {
			$property = $this->getUserSessionTimeOutEn();
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
	 public function printAllPropertiesToJsBundleVo(){
		try{
			foreach ($this as $key => $value){
				if (gettype($value) != "object"){
					$stringValue = '';
					if (gettype($value) == "integer"){
						$stringValue = strval($value);
					} else {
						$stringValue = $value;
					}
					echo '<input type="hidden" class="' . $key . '" value="' . $stringValue. '" />';
				}
			}
		} catch (Exception $ex) {
			$this->logger->error ($this->className . '->printAllPropertiesToJsBundleVo()', $ex);
			throw $ex;
		}
	}
}
?>