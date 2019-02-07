<?php
abstract class Reusable{
	protected $name;
	protected $isReady;
	protected $reusableObject;

	public function __construct($reusableObject){
		$this->reusableObject = $reusableObject;
	}
	public function getName(){
		return $this->name;
	}
	public function setName($name){
		$this->name = $name;
	}
	public function getIsReady(){
		return $this->isReady;
	}
	public function setIsReady($isReady){
		$this->isReady = $isReady;
	}
	abstract public function getReusableObject();

	public function __toString(){
		return $this->name . ', '. $this->isReady;
	}
}
?>