<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once(LOG4PHP_PATH . '/RabbitLogger.php');
abstract class ModelBase{
	private $logger;
	private $className;	
	public function __construct(){
		try{
			RabbitLogger::configure();
			$this->logger = RabbitLogger::getLogger(get_class($this));
			$this->className = get_class($this);
			$this->logger->debug('ModelBase::__construct');
		} catch (Exception $e){
			$this->logger->error($e);
		}
	}
	protected function tranverseLeaf($object2Transverse){
		if (isset($object2Transverse)){
			foreach($object2Transverse as $key => $value){
				$this->logger->info("\$key[$key] => $value");
				if (is_array($value)){
					$string2Eval = '$this->' . $key .'=new ' . $this->getObjectName() . '($value);';
					$this->logger->debug('$string2Eval=' . $string2Eval );
					eval($string2Eval);
					//$this->tranverseLeaf($value, $objectName);
				} else {
					$this->pairKey2Value($key, $value, $objectName);
				}
			}
		}
	}
	
	protected function pairKey2Value($key, $value){

		foreach ($this as $thisKey => $thisValue){
			if ($key == $thisKey){
				$string2Eval = '$this->' . $thisKey . '=';
				if (is_string($value)){
					$string2Eval .= '"'. $value . '";';
				} else if (is_int($value)){
					$string2Eval .= $value . ';';
				}
				$this->logger->debug('ModelBase::pairKey2Value() - $string2Eval=' . $string2Eval);
				eval($string2Eval);
			}
		}

	}
}

?>