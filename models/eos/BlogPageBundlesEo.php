<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( EOS_PATH . '/BundlesEo.php');
class BlogPageBundlesEo extends BundlesEo{
	private $pageEn;
	private $ofEn;
	private $dateEn;
	private $subjectEn;
	private $languageEn;
	private $categoryEn;
	private $remarksEn;
	private $editEn;
	private $selectACategoryEn;
	private $pageTc;
	private $ofTc;
	private $dateTc;
	private $subjectTc;
	private $languageTc;
	private $categoryTc;
	private $remarksTc;
	private $editTc;
	private $selectACategoryTc;
	public function __construct($defaultLang = NULL){
		parent::__construct($defaultLang);
	}
	public function setPageEn($pageEn){
		$this->pageEn=$pageEn;
	}
	public function getPageEn(){
		return $this->pageEn;
	}
	public function setOfEn($ofEn){
		$this->ofEn=$ofEn;
	}
	public function getOfEn(){
		return $this->ofEn;
	}
	public function setDateEn($dateEn){
		$this->dateEn=$dateEn;
	}
	public function getDateEn(){
		return $this->dateEn;
	}
	public function setSubjectEn($subjectEn){
		$this->subjectEn=$subjectEn;
	}
	public function getSubjectEn(){
		return $this->subjectEn;
	}
	public function setLanguageEn($languageEn){
		$this->languageEn=$languageEn;
	}
	public function getLanguageEn(){
		return $this->languageEn;
	}
	public function setCategoryEn($categoryEn){
		$this->categoryEn=$categoryEn;
	}
	public function getCategoryEn(){
		return $this->categoryEn;
	}
	public function setRemarksEn($remarksEn){
		$this->remarksEn=$remarksEn;
	}
	public function getRemarksEn(){
		return $this->remarksEn;
	}
	public function setEditEn($editEn){
		$this->editEn=$editEn;
	}
	public function getEditEn(){
		return $this->editEn;
	}
	public function setSelectACategoryEn($selectACategoryEn){
		$this->selectACategoryEn=$selectACategoryEn;
	}
	public function getSelectACategoryEn(){
		return $this->selectACategoryEn;
	}
	public function setPageTc($pageTc){
		$this->pageTc=$pageTc;
	}
	public function getPageTc(){
		return $this->pageTc;
	}
	public function setOfTc($ofTc){
		$this->ofTc=$ofTc;
	}
	public function getOfTc(){
		return $this->ofTc;
	}
	public function setDateTc($dateTc){
		$this->dateTc=$dateTc;
	}
	public function getDateTc(){
		return $this->dateTc;
	}
	public function setSubjectTc($subjectTc){
		$this->subjectTc=$subjectTc;
	}
	public function getSubjectTc(){
		return $this->subjectTc;
	}
	public function setLanguageTc($languageTc){
		$this->languageTc=$languageTc;
	}
	public function getLanguageTc(){
		return $this->languageTc;
	}
	public function setCategoryTc($categoryTc){
		$this->categoryTc=$categoryTc;
	}
	public function getCategoryTc(){
		return $this->categoryTc;
	}
	public function setRemarksTc($remarksTc){
		$this->remarksTc=$remarksTc;
	}
	public function getRemarksTc(){
		return $this->remarksTc;
	}
	public function setEditTc($editTc){
		$this->editTc=$editTc;
	}
	public function getEditTc(){
		return $this->editTc;
	}
	public function setSelectACategoryTc($selectACategoryTc){
		$this->selectACategoryTc=$selectACategoryTc;
	}
	public function getSelectACategoryTc(){
		return $this->selectACategoryTc;
	}
	public function getPage(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getPageTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getPageEn();
		} else {
			$property = $this->getPageEn();
		}
		return $property;
	}
	public function getOf(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getOfTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getOfEn();
		} else {
			$property = $this->getOfEn();
		}
		return $property;
	}
	public function getDate(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getDateTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getDateEn();
		} else {
			$property = $this->getDateEn();
		}
		return $property;
	}
	public function getSubject(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getSubjectTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getSubjectEn();
		} else {
			$property = $this->getSubjectEn();
		}
		return $property;
	}
	public function getLanguage(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getLanguageTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getLanguageEn();
		} else {
			$property = $this->getLanguageEn();
		}
		return $property;
	}
	public function getCategory(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getCategoryTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getCategoryEn();
		} else {
			$property = $this->getCategoryEn();
		}
		return $property;
	}
	public function getRemarks(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getRemarksTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getRemarksEn();
		} else {
			$property = $this->getRemarksEn();
		}
		return $property;
	}
	public function getEdit(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getEditTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getEditEn();
		} else {
			$property = $this->getEditEn();
		}
		return $property;
	}
	public function getSelectACategory(){
		$property = NULL;
		if(!isset($this->lang)){
			$this->lang = $this->defaultLang;
		}
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_TCHI){
			$property = $this->getSelectACategoryTc();
		} else
		if(isset($this->lang) && $this->lang == SystemConfigEo::$LANG_EN){
			$property = $this->getSelectACategoryEn();
		} else {
			$property = $this->getSelectACategoryEn();
		}
		return $property;
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
	 public function printAllPropertiesToJsBundleVo(){
		try{
			foreach ($this as $key => $value){
				if (gettype($value) != "object"){
					$stringValue = '';
					if (gettype($value) == "integer"){
						$stringValue = strval($value);
					} else {
						$stringValue = $value;
					}
					echo '<input type="hidden" class="' . $key . '" value="' . $stringValue. '" />';
				}
			}
		} catch (Exception $ex) {
			$this->logger->error ($this->className . '->printAllPropertiesToJsBundleVo()', $ex);
			throw $ex;
		}
	}
}
?>