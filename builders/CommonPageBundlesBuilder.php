<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( DAOS_PATH . '/Dao.php');
include_once (BUILDERS_PATH . '/BundlesBuilder.php');
include_once (EOS_PATH . '/SystemConfigEo.php');
include_once (EOS_PATH . '/CommonPageBundlesEo.php');
class CommonPageBundlesBuilder extends BundlesBuilder{
	private $className;
	private $logger;
	public function __construct($fileName, $bundle = NULL){
		parent::__construct($fileName, $bundle);
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger(get_class($this));
		if ($this->bundle === NULL){
			$this->bundle = new CommonPageBundlesEo();
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
				$bundleEo = new CommonPageBundlesEo($this->defaultLanguage);
				$submitEn=$propertyArray['submit.en'];
				$saveSuccessfullyEn=$propertyArray['save_successfully.en'];
				$saveFailureEn=$propertyArray['save_failure.en'];
				$deletionConfirmationEn=$propertyArray['deletion_confirmation.en'];
				$deleteSuccessfullyEn=$propertyArray['delete_successfully.en'];
				$deleteFailureEn=$propertyArray['delete_failure.en'];
				$noRecordFoundEn=$propertyArray['no_record_found.en'];
				$userDoesNotHaveRightEn=$propertyArray['user_does_not_have_right.en'];
				$areYouSureEn=$propertyArray['are_you_sure.en'];
				$saveEn=$propertyArray['save.en'];
				$loginSuccessfullyEn=$propertyArray['login_successfully.en'];
				$loginFailedEn=$propertyArray['login_failed.en'];
				$logoutSuccessfullyEn=$propertyArray['logout_successfully.en'];
				$logoutFailedEn=$propertyArray['logout_failed.en'];
				$abnormalNullableDataReturnEn=$propertyArray['abnormal_nullable_data_return.en'];
				$yesEn=$propertyArray['yes.en'];
				$noEn=$propertyArray['no.en'];
				$selectEn=$propertyArray['select.en'];
				$closeEn=$propertyArray['close.en'];
				$cancelEn=$propertyArray['cancel.en'];
				$chooseAFileToUploadEn=$propertyArray['choose_a_file_to_upload.en'];
				$browseFilesEn=$propertyArray['browse_files.en'];
				$filesAddedEn=$propertyArray['files_added.en'];
				$dataSaveConfirmationEn=$propertyArray['data_save_confirmation.en'];
				$isRequiredEn=$propertyArray['is_required.en'];
				$userDoesNotLoginEn=$propertyArray['user_does_not_login.en'];
				$userSessionTimeOutEn=$propertyArray['user_session_time_out.en'];
				$submitTc=$propertyArray['submit.tc'];
				$saveSuccessfullyTc=$propertyArray['save_successfully.tc'];
				$saveFailureTc=$propertyArray['save_failure.tc'];
				$deletionConfirmationTc=$propertyArray['deletion_confirmation.tc'];
				$deleteSuccessfullyTc=$propertyArray['delete_successfully.tc'];
				$deleteFailureTc=$propertyArray['delete_failure.tc'];
				$noRecordFoundTc=$propertyArray['no_record_found.tc'];
				$userDoesNotHaveRightTc=$propertyArray['user_does_not_have_right.tc'];
				$areYouSureTc=$propertyArray['are_you_sure.tc'];
				$saveTc=$propertyArray['save.tc'];
				$loginSuccessfullyTc=$propertyArray['login_successfully.tc'];
				$loginFailedTc=$propertyArray['login_failed.tc'];
				$logoutSuccessfullyTc=$propertyArray['logout_successfully.tc'];
				$logoutFailedTc=$propertyArray['logout_failed.tc'];
				$abnormalNullableDataReturnTc=$propertyArray['abnormal_nullable_data_return.tc'];
				$yesTc=$propertyArray['yes.tc'];
				$noTc=$propertyArray['no.tc'];
				$selectTc=$propertyArray['select.tc'];
				$closeTc=$propertyArray['close.tc'];
				$cancelTc=$propertyArray['cancel.tc'];
				$chooseAFileToUploadTc=$propertyArray['choose_a_file_to_upload.tc'];
				$browseFilesTc=$propertyArray['browse_files.tc'];
				$filesAddedTc=$propertyArray['files_added.tc'];
				$dataSaveConfirmationTc=$propertyArray['data_save_confirmation.tc'];
				$isRequiredTc=$propertyArray['is_required.tc'];
				$userDoesNotLoginTc=$propertyArray['user_does_not_login.tc'];
				$userSessionTimeOutTc=$propertyArray['user_session_time_out.tc'];
				if(isset($submitEn)){
					$bundleEo->setSubmitEn(trim($submitEn));
				}
				if(isset($saveSuccessfullyEn)){
					$bundleEo->setSaveSuccessfullyEn(trim($saveSuccessfullyEn));
				}
				if(isset($saveFailureEn)){
					$bundleEo->setSaveFailureEn(trim($saveFailureEn));
				}
				if(isset($deletionConfirmationEn)){
					$bundleEo->setDeletionConfirmationEn(trim($deletionConfirmationEn));
				}
				if(isset($deleteSuccessfullyEn)){
					$bundleEo->setDeleteSuccessfullyEn(trim($deleteSuccessfullyEn));
				}
				if(isset($deleteFailureEn)){
					$bundleEo->setDeleteFailureEn(trim($deleteFailureEn));
				}
				if(isset($noRecordFoundEn)){
					$bundleEo->setNoRecordFoundEn(trim($noRecordFoundEn));
				}
				if(isset($userDoesNotHaveRightEn)){
					$bundleEo->setUserDoesNotHaveRightEn(trim($userDoesNotHaveRightEn));
				}
				if(isset($areYouSureEn)){
					$bundleEo->setAreYouSureEn(trim($areYouSureEn));
				}
				if(isset($saveEn)){
					$bundleEo->setSaveEn(trim($saveEn));
				}
				if(isset($loginSuccessfullyEn)){
					$bundleEo->setLoginSuccessfullyEn(trim($loginSuccessfullyEn));
				}
				if(isset($loginFailedEn)){
					$bundleEo->setLoginFailedEn(trim($loginFailedEn));
				}
				if(isset($logoutSuccessfullyEn)){
					$bundleEo->setLogoutSuccessfullyEn(trim($logoutSuccessfullyEn));
				}
				if(isset($logoutFailedEn)){
					$bundleEo->setLogoutFailedEn(trim($logoutFailedEn));
				}
				if(isset($abnormalNullableDataReturnEn)){
					$bundleEo->setAbnormalNullableDataReturnEn(trim($abnormalNullableDataReturnEn));
				}
				if(isset($yesEn)){
					$bundleEo->setYesEn(trim($yesEn));
				}
				if(isset($noEn)){
					$bundleEo->setNoEn(trim($noEn));
				}
				if(isset($selectEn)){
					$bundleEo->setSelectEn(trim($selectEn));
				}
				if(isset($closeEn)){
					$bundleEo->setCloseEn(trim($closeEn));
				}
				if(isset($cancelEn)){
					$bundleEo->setCancelEn(trim($cancelEn));
				}
				if(isset($chooseAFileToUploadEn)){
					$bundleEo->setChooseAFileToUploadEn(trim($chooseAFileToUploadEn));
				}
				if(isset($browseFilesEn)){
					$bundleEo->setBrowseFilesEn(trim($browseFilesEn));
				}
				if(isset($filesAddedEn)){
					$bundleEo->setFilesAddedEn(trim($filesAddedEn));
				}
				if(isset($dataSaveConfirmationEn)){
					$bundleEo->setDataSaveConfirmationEn(trim($dataSaveConfirmationEn));
				}
				if(isset($isRequiredEn)){
					$bundleEo->setIsRequiredEn(trim($isRequiredEn));
				}
				if(isset($userDoesNotLoginEn)){
					$bundleEo->setUserDoesNotLoginEn(trim($userDoesNotLoginEn));
				}
				if(isset($userSessionTimeOutEn)){
					$bundleEo->setUserSessionTimeOutEn(trim($userSessionTimeOutEn));
				}
				if(isset($submitTc)){
					$bundleEo->setSubmitTc(trim($submitTc));
				}
				if(isset($saveSuccessfullyTc)){
					$bundleEo->setSaveSuccessfullyTc(trim($saveSuccessfullyTc));
				}
				if(isset($saveFailureTc)){
					$bundleEo->setSaveFailureTc(trim($saveFailureTc));
				}
				if(isset($deletionConfirmationTc)){
					$bundleEo->setDeletionConfirmationTc(trim($deletionConfirmationTc));
				}
				if(isset($deleteSuccessfullyTc)){
					$bundleEo->setDeleteSuccessfullyTc(trim($deleteSuccessfullyTc));
				}
				if(isset($deleteFailureTc)){
					$bundleEo->setDeleteFailureTc(trim($deleteFailureTc));
				}
				if(isset($noRecordFoundTc)){
					$bundleEo->setNoRecordFoundTc(trim($noRecordFoundTc));
				}
				if(isset($userDoesNotHaveRightTc)){
					$bundleEo->setUserDoesNotHaveRightTc(trim($userDoesNotHaveRightTc));
				}
				if(isset($areYouSureTc)){
					$bundleEo->setAreYouSureTc(trim($areYouSureTc));
				}
				if(isset($saveTc)){
					$bundleEo->setSaveTc(trim($saveTc));
				}
				if(isset($loginSuccessfullyTc)){
					$bundleEo->setLoginSuccessfullyTc(trim($loginSuccessfullyTc));
				}
				if(isset($loginFailedTc)){
					$bundleEo->setLoginFailedTc(trim($loginFailedTc));
				}
				if(isset($logoutSuccessfullyTc)){
					$bundleEo->setLogoutSuccessfullyTc(trim($logoutSuccessfullyTc));
				}
				if(isset($logoutFailedTc)){
					$bundleEo->setLogoutFailedTc(trim($logoutFailedTc));
				}
				if(isset($abnormalNullableDataReturnTc)){
					$bundleEo->setAbnormalNullableDataReturnTc(trim($abnormalNullableDataReturnTc));
				}
				if(isset($yesTc)){
					$bundleEo->setYesTc(trim($yesTc));
				}
				if(isset($noTc)){
					$bundleEo->setNoTc(trim($noTc));
				}
				if(isset($selectTc)){
					$bundleEo->setSelectTc(trim($selectTc));
				}
				if(isset($closeTc)){
					$bundleEo->setCloseTc(trim($closeTc));
				}
				if(isset($cancelTc)){
					$bundleEo->setCancelTc(trim($cancelTc));
				}
				if(isset($chooseAFileToUploadTc)){
					$bundleEo->setChooseAFileToUploadTc(trim($chooseAFileToUploadTc));
				}
				if(isset($browseFilesTc)){
					$bundleEo->setBrowseFilesTc(trim($browseFilesTc));
				}
				if(isset($filesAddedTc)){
					$bundleEo->setFilesAddedTc(trim($filesAddedTc));
				}
				if(isset($dataSaveConfirmationTc)){
					$bundleEo->setDataSaveConfirmationTc(trim($dataSaveConfirmationTc));
				}
				if(isset($isRequiredTc)){
					$bundleEo->setIsRequiredTc(trim($isRequiredTc));
				}
				if(isset($userDoesNotLoginTc)){
					$bundleEo->setUserDoesNotLoginTc(trim($userDoesNotLoginTc));
				}
				if(isset($userSessionTimeOutTc)){
					$bundleEo->setUserSessionTimeOutTc(trim($userSessionTimeOutTc));
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