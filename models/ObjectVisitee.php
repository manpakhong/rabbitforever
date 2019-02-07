<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once(MODELS_PATH . '/ObjectVisitor.php');

interface ObjectVisitee{
	public function accepts(ObjectVisitor $visitor);
	public function getPropertiesArray();
}
?>