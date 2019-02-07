<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
class BlogEo {
	protected $id;
	protected $blogDate;
	protected $subject;
	protected $content;
	protected $contentCm;
	protected $languageCode;
	protected $categoryId;
	protected $createdBy;
	protected $updatedBy;
	protected $createdDate;
	protected $updatedDate;
	protected $remarks;
	function __construct( $blogVo = NULL ){
		if($blogVo !== NULL ){
			$this->id = $blogVo->id;
			$this->blogDate = $blogVo->blogDate;
			$this->subject = $blogVo->subject;
			$this->content = $blogVo->content;
			$this->contentCm = $blogVo->contentCm;
			$this->languageCode = $blogVo->languageCode;
			$this->categoryId = $blogVo->categoryId;
			$this->createdBy = $blogVo->createdBy;
			$this->updatedBy = $blogVo->updatedBy;
			$this->createdDate = $blogVo->createdDate;
			$this->updatedDate = $blogVo->updatedDate;
			$this->remarks = $blogVo->remarks;
		}
	}
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getBlogDate(){
		return $this->blogDate;
	}
	public function setBlogDate($blogDate){
		$this->blogDate=$blogDate;
	}
	public function getSubject(){
		return $this->subject;
	}
	public function setSubject($subject){
		$this->subject=$subject;
	}
	public function getContent(){
		return $this->content;
	}
	public function setContent($content){
		$this->content=$content;
	}
	public function getContentCm(){
		return $this->contentCm;
	}
	public function setContentCm($contentCm){
		$this->contentCm=$contentCm;
	}
	public function getLanguageCode(){
		return $this->languageCode;
	}
	public function setLanguageCode($languageCode){
		$this->languageCode=$languageCode;
	}
	public function getCategoryId(){
		return $this->categoryId;
	}
	public function setCategoryId($categoryId){
		$this->categoryId=$categoryId;
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