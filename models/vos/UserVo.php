<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once ( EOS_PATH . '/UserEo.php' );
class UserVo{
	public $id;
	public $userName;
	public $password;
	public $userFullNameEn;
	public $userFullNameTc;
	public $isActivated;
	public $updatedBy;
	public $createdDateString;
	public $createdDate;
	public $updatedDateSTring;
	public $updatedDate;
	public $remarks;
	public $isAuthenticated;
	public $isLogoff;
	function __construct($userEo = NULL){
		
		if ($userEo !== NULL){
			$this->id = $userEo->getId();
			$this->userName = $userEo->getUserName();
// 			$this->password = $userEo->getPassword();
			$this->userFullNameEn = $userEo->getUserFullNameEn();
			$this->userFullNameTc = $userEo->getUserFullNameTc();
			$this->isActivated = $userEo->getIsActivated();
			$this->updatedBy = $userEo->getUpdatedBy();
			$this->createdDate = $userEo->getCreatedDate();
			$this->updatedDate = $userEo->getUpdatedDate();
			$this->remarks = $userEo->getRemarks();
		}

	}
}
?>