<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once(MODELS_PATH . '/ObjectVisitee.php');

interface ObjectVisitor{
	public function visits(ObjectVisitee $objectVisitee);
}
?>