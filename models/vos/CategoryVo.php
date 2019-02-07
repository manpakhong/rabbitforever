<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( EOS_PATH . '/CategoryEo.php');
class CategoryVo {
	public $id;
	public $menuId;
	public $seq;
	public $lv;
	public $lvMenuEn;
	public $lvMenuTc;
	public $lvParentMenuId;
	public $isShown;
	public $isEnabled;
	public $isCategory;
	public $url;
	public $createdBy;
	public $updatedBy;
	public $createdDate;
	public $createdDateString;
	public $updatedDate;
	public $updatedDateString;
	public $remarks;
	public $categoryDisplayString;
	function __construct($categoryEo = NULL){
		if ($categoryEo !== NULL){
			$this->id = $categoryEo->getId();
			$this->menuId = $categoryEo->getMenuId();
			$this->seq = $categoryEo->getSeq();
			$this->lv = $categoryEo->getLv();
			$this->lvMenuEn = $categoryEo->getLvMenuEn();
			$this->lvMenuTc = $categoryEo->getLvMenuTc();
			$this->lvParentMenuId = $categoryEo->getLvParentMenuId();
			$this->isShown = $categoryEo->getIsShown();
			$this->isEnabled = $categoryEo->getIsEnabled();
			$this->isCategory = $categoryEo->getIsCategory();
			$this->url = $categoryEo->getUrl();
			$this->createdBy = $categoryEo->getCreatedBy();
			$this->updatedBy = $categoryEo->getUpdatedBy();
			$this->createdDate = $categoryEo->getCreatedDate();
			$this->updatedDate = $categoryEo->getUpdatedDate();
			$this->remarks = $categoryEo->getRemarks();
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