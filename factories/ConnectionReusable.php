<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (FRAMEWORK_PATH . '/Reusable.php');
class ConnectionReusable extends Reusable{

	public function __construct($reusableObject){
		parent::__construct($reusableObject);
	}

	public function getReusableObject(){
		return $this->reusableObject;
	}
}
?>