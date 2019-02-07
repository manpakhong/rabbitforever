<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
class UserEo {
	protected $id;
	protected $userName;
	protected $password;
	protected $userFullNameEn;
	protected $userFullNameTc;
	protected $isActivated;
	protected $createdBy;
	protected $updatedBy;
	protected $createdDate;
	protected $updatedDate;
	protected $remarks;
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getUserName(){
		return $this->userName;
	}
	public function setUserName($userName){
		$this->userName=$userName;
	}
	public function getPassword(){
		return $this->password;
	}
	public function setPassword($password){
		$this->password=$password;
	}
	public function getUserFullNameEn(){
		return $this->userFullNameEn;
	}
	public function setUserFullNameEn($userFullNameEn){
		$this->userFullNameEn=$userFullNameEn;
	}
	public function getUserFullNameTc(){
		return $this->userFullNameTc;
	}
	public function setUserFullNameTc($userFullNameTc){
		$this->userFullNameTc=$userFullNameTc;
	}
	public function getIsActivated(){
		return $this->isActivated;
	}
	public function setIsActivated($isActivated){
		$this->isActivated=$isActivated;
	}
	public function getCreatedBy(){
		return $this->createdBy;
	}
	public function setCreatedBy($createdBy){
		$this->createdBy=$createdBy;
	}
	public function getUpdatedBy(){
		return $this->updatedBy;
	}
	public function setUpdatedBy($updatedBy){
		$this->updatedBy=$updatedBy;
	}
	public function getCreatedDate(){
		return $this->createdDate;
	}
	public function setCreatedDate($createdDate){
		$this->createdDate=$createdDate;
	}
	public function getUpdatedDate(){
		return $this->updatedDate;
	}
	public function setUpdatedDate($updatedDate){
		$this->updatedDate=$updatedDate;
	}
	public function getRemarks(){
		return $this->remarks;
	}
	public function setRemarks($remarks){
		$this->remarks=$remarks;
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
} //end class
?>