<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (EOS_PATH . '/DbPropertiesEo.php');
class MySqlDbPropertiesEo implements DbPropertiesEo{
	private $host;
	private $port;
	private $schema;
	private $userName;
	private $password;
	private $systemSchema;
	private $fixedIpAddress;
	public function getHost(){
		return $this->host;
	}
	
	public function setHost($host){
		$this->host = $host;
	}
	
	public function getPort(){
		return $this->port;
	}
	
	public function setPort($port){
		$this->port = $port;
	}
	
	public function getSchema(){
		return $this->schema;
	}
	
	public function setSchema($schema){
		$this->schema = $schema;
	}
	
	public function getUserName(){
		return $this->userName;
	}
	
	public function setUserName($userName){
		$this->userName = $userName;
	}
	
	public function getPassword(){
		return $this->password;
	}
	
	public function setPassword($password){
		$this->password = $password;
	}
	
	public function getSystemSchema(){
		return $this->systemSchema;
	}
	
	public function setSystemSchema($systemSchema){
		$this->systemSchema = $systemSchema;
	}
	
	public function getFixedIpAddress(){
		return $this->fixedIpAddress;
	}
	
	public function setFixedIpAddress($fixedIpAddress){
		$this->fixedIpAddress = $fixedIpAddress;
	}
}
?>