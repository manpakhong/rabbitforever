<?php
interface DbPropertiesEo{
	public function getHost();
	public function getPort();
	public function getSchema();
	public function getUserName();
	public function getPassword();
	public function getSystemSchema();
	public function getFixedIpAddress();
}
?>