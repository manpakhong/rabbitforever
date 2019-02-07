<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once(MODELS_PATH . '/ObjectVisitor.php');
include_once(MODELS_PATH . '/ObjectVisitee.php');
include_once(MODELS_PATH . '/ModelHelper.php');
include_once(UTILS_PATH . '/CommonUtils.php');
include_once(LOG4PHP_PATH . '/RabbitLogger.php');

class SoVisitor implements ObjectVisitor{
	private $propertiesArray;
	private $modelHelper;
	private $commonUtils;
	private $logger;
	public function __construct(){
		RabbitLogger::configure();
		$this->logger = RabbitLogger::getLogger(get_class($this));
		$this->modelHelper = new ModelHelper();
		$this->commonUtils = new CommonUtils();
	}
	
	public function visits(ObjectVisitee $objectVisitee){
		$this->propertiesArray = $objectVisitee->getPropertiesArray();
		//print_r($this->propertiesArray);
	}
	public function getConditionString(){
		$conditionString;
		try{
			if(isset($this->propertiesArray)){
				$count = 0;
				//print_r($this->propertiesArray);
				//print "<br/>";
				$isDateRange = False;
				foreach($this->propertiesArray as $key => $value){
					if (isset($value)){
						//print "$key => $value" . '<br/>';
						if ($count == 0){
							$conditionString = "where ";
						} else {
							$conditionString .= "and ";
						}
						if (strpos($key, 'From')){
							$modifiedKey = str_replace("From", "", $key);
							$modifiedKey = $this->modelHelper->convertObjToDbFieldName($modifiedKey);
							$conditionString .= "$modifiedKey between " . "? ";
							$isDateRange = True;
						} else if (strpos($key, 'To')){
							$modifiedKey = $this->modelHelper->convertObjToDbFieldName($modifiedKey);
							$conditionString .= "? ";
							$isDateRange = False;
						} else {
							$modifiedKey = $this->modelHelper->convertObjToDbFieldName($key);
							$conditionString .= "$modifiedKey = " . "? ";
						}
						$count += 1;

					}
				}
			}
		} catch (Exception $e){
			$this->logger->error($e);
		}
		
		if ($this->logger->isDebugEnabled()){
			$this->logger->debug('getConditionString(): $conditionString = ' . $conditionString);
		}
		return $conditionString;
	}
	public function bindStatement($stmt){
		
		try{
			$bindTypeString = $this->getBindString();
			$paramArray[] = $bindTypeString;
			
			foreach($this->propertiesArray as $key => $value){
				if (isset($value)){
					if ($value instanceof DateTime){
						$value = $this->commonUtils->convertDateTimeToDbString($value);
					}
					$paramArray[] = &$value;
				}
			}
	//		$paramArray[] = "i";
			//$paramArray[] = "2015-11-13";
			//$paramArray[] = "2015-11-14";
	//		$paramArray[] = 1;
			
	//		print_r($paramArray);
			//print("<br/>");
			if ($this->logger->isDebugEnabled()){
				$this->logger->debug('bindStatement(): $paramArray[] = ' . var_export($paramArray, true));
			}
			
			if (count($this->propertiesArray) > 0){
				call_user_func_array(array($stmt,'bind_param'), $paramArray);
			}
		} catch (Exception $e){
			$this->logger->error($e);
		}
	}
	private function getBindString(){
		if(isset($this->propertiesArray)){
			$bindTypeString;
			foreach($this->propertiesArray as $key => $value){
				if (isset($value)){
					$bindTypeString .= $this->modelHelper->getBindType($value);
				}
			}
		}		
		return $bindTypeString;
	}
	
}

?>