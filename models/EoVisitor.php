<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once(MODELS_PATH . '/ObjectVisitor.php');
include_once(MODELS_PATH . '/ObjectVisitee.php');

class EoVisitor implements ObjectVisitor{
	public function visits(ObjectVisitee $objectVisitee){
		//print_r($objectVisitee);
		$propertiesArray = $objectVisitee->getPropertiesArray();
		if(isset($propertiesArray)){
			foreach($propertiesArray as $key => $value){
				if (isset($value)){
					print "$key => $value" . '<br/>';
				}
			}
		}
	}
}

?>