<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
class UserPreferencesEo {
	protected $id;
	protected $userLoginId;
	protected $defaultLanguage;
	protected $defaultPage;
	protected $column1;
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
	public function getUserLoginId(){
		return $this->userLoginId;
	}
	public function setUserLoginId($userLoginId){
		$this->userLoginId=$userLoginId;
	}
	public function getDefaultLanguage(){
		return $this->defaultLanguage;
	}
	public function setDefaultLanguage($defaultLanguage){
		$this->defaultLanguage=$defaultLanguage;
	}
	public function getDefaultPage(){
		return $this->defaultPage;
	}
	public function setDefaultPage($defaultPage){
		$this->defaultPage=$defaultPage;
	}
	public function getColumn1(){
		return $this->column1;
	}
	public function setColumn1($column1){
		$this->column1=$column1;
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