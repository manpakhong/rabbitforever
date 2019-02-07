<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( EOS_PATH . '/BlogEo.php');
class BlogVo {
	public $id;
	public $blogDate;
	public $subject;
	public $content;
	public $contentCm;
	public $languageCode;
	public $categoryId;
	public $categoryString;
	public $createdBy;
	public $updatedBy;
	public $createdDate;
	public $updatedDate;
	public $remarks;
	function __construct($blogEo = NULL){
		if ($blogEo !== NULL){
			$this->id = $blogEo->getId();
			$this->blogDate = $blogEo->getBlogDate();
			$this->subject = $blogEo->getSubject();
			$this->content = $blogEo->getContent();
			$this->contentCm = $blogEo->getContentCm();
			$this->languageCode = $blogEo->getLanguageCode();
			$this->categoryId = $blogEo->getCategoryId();
			$this->createdBy = $blogEo->getCreatedBy();
			$this->updatedBy = $blogEo->getUpdatedBy();
			$this->createdDate = $blogEo->getCreatedDate();
			$this->updatedDate = $blogEo->getUpdatedDate();
			$this->remarks = $blogEo->getRemarks();
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