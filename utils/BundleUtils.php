<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
class BundleUtils {
	private $className;
	private $logger;
	function __construct() {
		$this->getClassName();
		$this->logger = RabbitLogger::getLogger(get_class($this));
	}
	
	private function getClassName(){
		if (!isset($this->className)){
			$this->className =  __CLASS__;
		}
		return $this->className;
	}
	public function parseProperties($fileContent) {
		$result = array ();
		try {
			$lines = explode ( "\n", $fileContent );
			$key = "";
			
			$isWaitingOtherLine = false;
			foreach ( $lines as $i => $line ) {
				
				if (empty ( $line ) || (! $isWaitingOtherLine && strpos ( $line, "#" ) === 0))
					continue;
				
				if (! $isWaitingOtherLine) {
					$key = substr ( $line, 0, strpos ( $line, '=' ) );
					$value = substr ( $line, strpos ( $line, '=' ) + 1, strlen ( $line ) );
				} else {
					$value .= $line;
				}
				
				/* Check if ends with single '\' */
				if (strrpos ( $value, "\\" ) === strlen ( $value ) - strlen ( "\\" )) {
					$value = substr ( $value, 0, strlen ( $value ) - 1 ) . "\n";
					$isWaitingOtherLine = true;
				} else {
					$isWaitingOtherLine = false;
				}
				
				$result [$key] = $value;
				unset ( $lines [$i] );
			}
		} catch ( Exception $ex ) {
			$this->logger->error ($this->className . '->parseProperties() - $propertiesString=' . $propertiesString ,$ex );
			throw $ex;
		}
		return $result;
	}
}
?>