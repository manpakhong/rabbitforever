<?php
class ModelHelper{
	public function convertObjToDbFieldName($objFieldName){
		$dbFieldName;
		$isValid = $this->isValidName($objFieldName);
		if ($isValid){
			$strArr = str_split($objFieldName);
			for ($i = 0; $i < sizeof($strArr); $i++){
				$isUpperCase = !ctype_lower($strArr[$i]);
				if ($isUpperCase){
					$dbFieldName .= '_';
					$dbFieldName .= strtolower($strArr[$i]);
				} else {
					$dbFieldName .= $strArr[$i];
				}
			}
		}
		return $dbFieldName;
	}
	private function isValidName($objFieldName){
		$isValid = True;
		
		$firstChar = substr($objFieldName, 0, 1);
		if(!ctype_lower($firstChar)){
			$isValid = False;
		}	
		return $isValid;
	}
	
	public function getBindType($value){
		$bindType;
		if(is_object($value)){
			if ($value instanceof DateTime){
				$bindType = 's';
			}
		}
		if (is_null($value)){
			// do nothing
		}
		if(is_string($value)){
			$bindType = 's';
		}
		if(is_array($value)){
			// do nothing
		}
		if(is_int($value)){
			$bindType = 'i';
		}
		if(is_bool($value)){
			$bindType = 'i';
		}
		if(is_float($value)){
			$bindType = 'd';
		}
		if(is_resource($value)){
			// do nothing
		}
		return $bindType;
	}
}

?>