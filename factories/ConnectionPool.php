<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once(FRAMEWORK_PATH . '/ReusablePool.php');

class ConnectionPool implements ReusablePool{
	private $reusableArray;
	private static $connectionPool;
	private $maxPoolSize;
	private $reusableBuilder;
	private function __construct(){
		$this->maxPoolSize = 10;
		$this->reusableArray = array();

	}

	public static function getInstance(){
		if (!isset($connectionPool)){
			$connectionPool = new ConnectionPool();
		}
		return $connectionPool;
	}

	private function checkAndBuildInstanceOfReusableBuilder(){
		if (!isset($this->reusableBuilder)){
			$this->reusableBuilder = ConnectionReusableBuilder::getInstance();
			//echo '$this->reusableBuilder created!' . '<br/>';
		}
	}
	public function acquireReusable(){
		$isFound = False;
		$resuable;

		$this->checkAndBuildInstanceOfReusableBuilder();

		if (isset($this->reusableArray) && sizeof($this->reusableArray) > 0){
			foreach ($this->reusableArray as $reusableLoop){
				if (isset($reusableLoop) && $reusableLoop->getIsReady()){
					$reusable = $reusableLoop;
					echo 'isset and isReady' . '<br/>';
				}
			}
			if (!$isFound){
				$reusable = $this->reusableBuilder->buildReusable();
				$reusable->setIsReady(False);
				array_push($this->reusableArray, $reusable);
				echo 'no available reusable is Found' . '<br/>';
			}
		} else {
			$reusable = $this->reusableBuilder->buildReusable();
			$reusable->setIsReady(False);
			array_push($this->reusableArray, $reusable);
			//echo 'size == 0' . '<br/>';
		}
		//echo 'current pool size: ' . sizeof($this->reusableArray) . '<br/>';
		return $reusable;
	}
	public function setMaxPoolSize($maxPoolSize){
		$this->maxPoolSize = $maxPoolSize;
	}
}
?>