<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
class MovieEo {
	protected $id;
	protected $movieNameEn;
	protected $movieNameTc;
	protected $movieTypeId;
	protected $classCode;
	protected $moviePic1;
	protected $moviePic2;
	protected $movieTrailor;
	protected $createdBy;
	protected $updatedBy;
	protected $createdDate;
	protected $updatedDate;
	protected $remarks;
	function __construct( $movieVo = NULL ){
		if($movieVo !== NULL ){
			$this->id = $movieVo->id;
			$this->movieNameEn = $movieVo->movieNameEn;
			$this->movieNameTc = $movieVo->movieNameTc;
			$this->movieTypeId = $movieVo->movieTypeId;
			$this->classCode = $movieVo->classCode;
			$this->moviePic1 = $movieVo->moviePic1;
			$this->moviePic2 = $movieVo->moviePic2;
			$this->movieTrailor = $movieVo->movieTrailor;
			$this->createdBy = $movieVo->createdBy;
			$this->updatedBy = $movieVo->updatedBy;
			$this->createdDate = $movieVo->createdDate;
			$this->updatedDate = $movieVo->updatedDate;
			$this->remarks = $movieVo->remarks;
		}
	}
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getMovieNameEn(){
		return $this->movieNameEn;
	}
	public function setMovieNameEn($movieNameEn){
		$this->movieNameEn=$movieNameEn;
	}
	public function getMovieNameTc(){
		return $this->movieNameTc;
	}
	public function setMovieNameTc($movieNameTc){
		$this->movieNameTc=$movieNameTc;
	}
	public function getMovieTypeId(){
		return $this->movieTypeId;
	}
	public function setMovieTypeId($movieTypeId){
		$this->movieTypeId=$movieTypeId;
	}
	public function getClassCode(){
		return $this->classCode;
	}
	public function setClassCode($classCode){
		$this->classCode=$classCode;
	}
	public function getMoviePic1(){
		return $this->moviePic1;
	}
	public function setMoviePic1($moviePic1){
		$this->moviePic1=$moviePic1;
	}
	public function getMoviePic2(){
		return $this->moviePic2;
	}
	public function setMoviePic2($moviePic2){
		$this->moviePic2=$moviePic2;
	}
	public function getMovieTrailor(){
		return $this->movieTrailor;
	}
	public function setMovieTrailor($movieTrailor){
		$this->movieTrailor=$movieTrailor;
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