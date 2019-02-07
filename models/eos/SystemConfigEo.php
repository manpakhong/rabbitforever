<?php
class SystemConfigEo{
	public static $LANG_TCHI = 'LANG_TC';
	public static $LANG_EN = 'LANG_EN';
	private $isProduction;
	private $defaultLanguage;
	private $backgroundsPath;
	private $defaultBlogRecordsPerPage;
	private $cookieExpiryHr;
	private $defaultRecentUpdateRecords;
	public function getIsProduction(){
		return $this->isProduction;
	}
	
	public function setIsProduction($isProduction){
		$this->isProduction = $isProduction;
	}
	
	public function getDefaultLanguage(){
		return $this->defaultLanguage;
	}
	
	public function setDefaultLanguage($defaultLanguage){
		$this->defaultLanguage = $defaultLanguage;
	}
	public function getBackgroundsPath(){
		return $this->backgroundsPath;
	}
	
	public function setBackgroundsPath($backgroundsPath){
		$this->backgroundsPath = $backgroundsPath;
	}
	public function getDefaultBlogRecordsPerPage(){
		return $this->defaultBlogRecordsPerPage;
	}
	
	public function setDefaultBlogRecordsPerPage($defaultBlogRecordsPerPage){
		$this->defaultBlogRecordsPerPage = $defaultBlogRecordsPerPage;
	}
	public function getCookieExpiryHr(){
		return $this->cookieExpiryHr;
	}
	
	public function setCookieExpiryHr($cookieExpiryHr){
		$this->cookieExpiryHr = $cookieExpiryHr;
	}
	public function getDefaultRecentUpdateRecords(){
		return $this->defaultRecentUpdateRecords;
	}
	
	public function setDefaultRecentUpdateRecords($defaultRecentUpdateRecords){
		$this->defaultRecentUpdateRecords = $defaultRecentUpdateRecords;
	}
}
?>