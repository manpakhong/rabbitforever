<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( EOS_PATH . '/MenuEo.php');
class MenuVo {
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
	public $updatedDate;
	public $remarks;
	function __construct($menuEo = NULL){
		if ($menuEo !== NULL){
			$this->id = $menuEo->getId();
			$this->menuId = $menuEo->getMenuId();
			$this->seq = $menuEo->getSeq();
			$this->lv = $menuEo->getLv();
			$this->lvMenuEn = $menuEo->getLvMenuEn();
			$this->lvMenuTc = $menuEo->getLvMenuTc();
			$this->lvParentMenuId = $menuEo->getLvParentMenuId();
			$this->isShown = $menuEo->getIsShown();
			$this->isEnabled = $menuEo->getIsEnabled();
			$this->isCategory = $menuEo->getIsCategory();
			$this->url = $menuEo->getUrl();
			$this->createdBy = $menuEo->getCreatedBy();
			$this->updatedBy = $menuEo->getUpdatedBy();
			$this->createdDate = $menuEo->getCreatedDate();
			$this->updatedDate = $menuEo->getUpdatedDate();
			$this->remarks = $menuEo->getRemarks();
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