<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
class MenuEo {
	protected $id;
	protected $menuId;
	protected $seq;
	protected $lv;
	protected $lvMenuEn;
	protected $lvMenuTc;
	protected $lvParentMenuId;
	protected $isShown;
	protected $isEnabled;
	protected $isCategory;
	protected $url;
	protected $createdBy;
	protected $updatedBy;
	protected $createdDate;
	protected $updatedDate;
	protected $remarks;
	function __construct( $menuVo = NULL ){
		if($menuVo !== NULL ){
			$this->id = $menuVo->id;
			$this->menuId = $menuVo->menuId;
			$this->seq = $menuVo->seq;
			$this->lv = $menuVo->lv;
			$this->lvMenuEn = $menuVo->lvMenuEn;
			$this->lvMenuTc = $menuVo->lvMenuTc;
			$this->lvParentMenuId = $menuVo->lvParentMenuId;
			$this->isShown = $menuVo->isShown;
			$this->isEnabled = $menuVo->isEnabled;
			$this->isCategory = $menuVo->isCategory;
			$this->url = $menuVo->url;
			$this->createdBy = $menuVo->createdBy;
			$this->updatedBy = $menuVo->updatedBy;
			$this->createdDate = $menuVo->createdDate;
			$this->updatedDate = $menuVo->updatedDate;
			$this->remarks = $menuVo->remarks;
		}
	}
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getMenuId(){
		return $this->menuId;
	}
	public function setMenuId($menuId){
		$this->menuId=$menuId;
	}
	public function getSeq(){
		return $this->seq;
	}
	public function setSeq($seq){
		$this->seq=$seq;
	}
	public function getLv(){
		return $this->lv;
	}
	public function setLv($lv){
		$this->lv=$lv;
	}
	public function getLvMenuEn(){
		return $this->lvMenuEn;
	}
	public function setLvMenuEn($lvMenuEn){
		$this->lvMenuEn=$lvMenuEn;
	}
	public function getLvMenuTc(){
		return $this->lvMenuTc;
	}
	public function setLvMenuTc($lvMenuTc){
		$this->lvMenuTc=$lvMenuTc;
	}
	public function getLvParentMenuId(){
		return $this->lvParentMenuId;
	}
	public function setLvParentMenuId($lvParentMenuId){
		$this->lvParentMenuId=$lvParentMenuId;
	}
	public function getIsShown(){
		return $this->isShown;
	}
	public function setIsShown($isShown){
		$this->isShown=$isShown;
	}
	public function getIsEnabled(){
		return $this->isEnabled;
	}
	public function setIsEnabled($isEnabled){
		$this->isEnabled=$isEnabled;
	}
	public function getIsCategory(){
		return $this->isCategory;
	}
	public function setIsCategory($isCategory){
		$this->isCategory=$isCategory;
	}
	public function getUrl(){
		return $this->url;
	}
	public function setUrl($url){
		$this->url=$url;
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