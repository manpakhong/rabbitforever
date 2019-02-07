<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( EOS_PATH . '/CodeEo.php');
class CodeVo {
	public $id;
	public $code;
	public $descEn;
	public $descTc;
	public $codeType;
	public $createdBy;
	public $updatedBy;
	public $createdDate;
	public $updatedDate;
	public $remarks;
	function __construct($codeEo = NULL){
		if ($codeEo !== NULL){
			$this->id = $codeEo->getId();
			$this->code = $codeEo->getCode();
			$this->descEn = $codeEo->getDescEn();
			$this->descTc = $codeEo->getDescTc();
			$this->codeType = $codeEo->getCodeType();
			$this->createdBy = $codeEo->getCreatedBy();
			$this->updatedBy = $codeEo->getUpdatedBy();
			$this->createdDate = $codeEo->getCreatedDate();
			$this->updatedDate = $codeEo->getUpdatedDate();
			$this->remarks = $codeEo->getRemarks();
		}
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