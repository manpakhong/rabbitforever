<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( SERVICES_PATH . '/Manager.php');
include_once( DAOS_PATH . '/CategoryDao.php');
include_once( EOS_PATH . '/CategoryEo.php');
define('MIN_LV', 0);
class CategoryMgr extends Manager{
	private $className;
	private $logger;
	private $dao;
	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
	}
	private function init(){
		$this->dao = new CategoryDao ();
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	public function selectMaxId(){
		$maxId = NULL;
		try {
			$maxId = $this->dao->selectMaxId();
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->selectMaxId()', $ex );
			throw $ex;
		}
		return $maxId;
	}
	public function getCategoryEoDisplayString($menuId, $lang=NULL){
		$catetoryEoDisplayString = '';
		try {
			if ($lang == NULL){
				$lang = $this->systemConfigEo->getDefaultLanguage();
			}
			$categoryEoAccumulatedArray = $this->getCategoryEoAccumulatedArray($menuId);
			if (isset($categoryEoAccumulatedArray)){
				$count = 0;
				foreach($categoryEoAccumulatedArray as $key => $value){
					if ($count > 0){
						$catetoryEoDisplayString .= '->';
					}
					if ($lang == SystemConfigEo::$LANG_TCHI){
						$catetoryEoDisplayString .=  $value->getLvMenuTc();
					} else
					if ($lang == SystemConfigEo::$LANG_EN){
						$catetoryEoDisplayString .= $value->getLvMenuEn();
					}
					$count++;
				}
			}
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->getCategoryEoDisplayString() - $menuId=' . print_r($menuId, 1), $ex );
			throw $ex;
		}
		return $catetoryEoDisplayString;
	}
	public function getCategoryEoAccumulatedArray($menuId){
		$categoryEoAccumulatedArray = array();
		$reversedArray = NULL;
		try {
			$this->traverseCategoryEoAccumulatedArray($menuId, $categoryEoAccumulatedArray);
			$reversedArray = array_reverse($categoryEoAccumulatedArray);
			//print_r($categoryEoAccumulatedArray);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->getCategoryEoAccumulatedArray() - $menuId=' . print_r($menuId, 1), $ex );
			throw $ex;
		}
		return $reversedArray;
	}
	public function traverseCategoryEoAccumulatedArray($menuId, &$categoryEoAccumulatedArray = NULL){
		try {
			if ($categoryEoAccumulatedArray == NULL){

				$categoryEoAccumulatedArray = array();
			}

			if (isset($menuId)){
				$so = new CategorySo();
				$so->setMenuId($menuId);
				$categoryEoArray = $this->dao->select($so);
				if (isset($categoryEoArray) && $categoryEoArray != NULL){

					if (count($categoryEoArray) == 1){
						$categoryEo = $categoryEoArray[0];
						$lv = $categoryEo->getLv();
						$lvParentMenuId = $categoryEo->getLvParentMenuId();
						array_push($categoryEoAccumulatedArray, $categoryEo);
						if ($lv == MIN_LV){
							//print_r($categoryEoAccumulatedArray);
							return $categoryEoAccumulatedArray;
						}  else {
							$this->traverseCategoryEoAccumulatedArray($lvParentMenuId, $categoryEoAccumulatedArray);
						}
						
					} else {
						$this->logger->warn($this->className, '->traverseCategoryEoAccumulatedArray() - $categoryEoArray != 1: ' . print_r($categoryEoAccumulatedArray, 1));
					}
				}
			}
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->traverseCategoryEoAccumulatedArray() - $menuId=' . print_r($menuId, 1), $ex );
			throw $ex;
		}

	}
	public function select($so){
		$categoryEoArray = NULL;
		try {
			$categoryEoArray = $this->dao->select($so);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->select() - $so=' . $so, $ex );
			throw $ex;
		}
		return $categoryEoArray;
	}
	public function insert($eo){
		$id = NULL;
		try {
			$id = $this->dao->insert($eo);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->insert() - $eo=' . $eo, $ex );
			throw $ex;
		}
		return $id;
	}
	public function update($eo){
		$affectedRows = NULL;
		try {
			$affectedRows = $this->dao->update($eo);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->update() - $eo=' . $eo, $ex );
			throw $ex;
		}
		return $affectedRows;
	}
	public function delete($eo){
		$affectedRows = NULL;
		try {
			$affectedRows = $this->dao->delete($eo);
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->delete() - $eo=' . $eo, $ex );
			throw $ex;
		}
		return $affectedRows;
	}
}
?>