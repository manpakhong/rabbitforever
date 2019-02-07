<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( DAOS_PATH . '/Dao.php');
class CategoryDao extends Dao{
	private $className;
	private $logger;
	private $selectSql;
	private $insertSql;
	private $updateSql;
	private $deleteSql;
	public function __construct(){
		parent::__construct();
		$this->fillClassName();
		$this->logger = RabbitLogger::getLogger($this->className);
		$this->init();
	}
	private function init(){
		$this->selectMaxSql =
		'select ' .
		'max(id) as max_id ' .
		'from ' .
		'cmn_category ';
		$this->selectSql =
		'select ' .
		'id, ' .
		'menu_id, ' .
		'seq, ' .
		'lv, ' .
		'lv_menu_en, ' .
		'lv_menu_tc, ' .
		'lv_parent_menu_id, ' .
		'is_shown, ' .
		'is_enabled, ' .
		'is_category, ' .
		'url, ' .
		'created_by, ' .
		'updated_by, ' .
		'created_date, ' .
		'updated_date, ' .
		'remarks ' .
		'from ' .
		'cmn_category ';
		$this->insertSql =
		'insert into ' .
		'cmn_category' .
		'(' .
		'id, ' .
		'menu_id, ' .
		'seq, ' .
		'lv, ' .
		'lv_menu_en, ' .
		'lv_menu_tc, ' .
		'lv_parent_menu_id, ' .
		'is_shown, ' .
		'is_enabled, ' .
		'is_category, ' .
		'url, ' .
		'created_by, ' .
		'updated_by, ' .
		'created_date, ' .
		'updated_date, ' .
		'remarks ' .
		') ' .
		'values ' .
		'(' .
		'?, ' .
		'?, ' .
		'?, ' .
		'?, ' .
		'?, ' .
		'?, ' .
		'?, ' .
		'?, ' .
		'?, ' .
		'?, ' .
		'?, ' .
		'?, ' .
		'?, ' .
		'?, ' .
		'?, ' .
		'? ' .
		');'; 
		$this->updateSql =
		'update ' .
		'cmn_category ' .
		'set ' .
		'id = ?, ' .
		'menu_id = ?, ' .
		'seq = ?, ' .
		'lv = ?, ' .
		'lv_menu_en = ?, ' .
		'lv_menu_tc = ?, ' .
		'lv_parent_menu_id = ?, ' .
		'is_shown = ?, ' .
		'is_enabled = ?, ' .
		'is_category = ?, ' .
		'url = ?, ' .
		'created_by = ?, ' .
		'updated_by = ?, ' .
		'created_date = ?, ' .
		'updated_date = ?, ' .
		'remarks = ? ' .
		'where ' .
		'id = ? '; 
		$this->deleteSql =
		'delete from ' .
		'cmn_category ' .
		'where ' .
		'id = ? '; 
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	public function selectMaxId(){
		$returnId = NULL;
		try {
			$selectMaxSql = $this->selectMaxSql;
			$stmt = $this->connection->prepare($selectMaxSql);
			if($stmt){
				$stmt->execute();
				$stmt->bind_result(
					$maxId
				);
				while ($stmt->fetch()){
					$returnMaxId = $maxId;
				}
				$stmt->close();
			}
		} catch (Exception $ex) {
			$this->logger->error($this->className . '->selectMaxId()', $ex );
			throw $ex;
		}
	}
	public function select($so){
		$categoryEoArray = NULL;
		$bindFirstParam = NULL;
		$bindSecondParam = NULL;
		try {
			$selectSql = $this->selectSql;
			if (isset($so)){
				$i = 0;
				if(NULL !== $so->getId()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'id = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'i';
					$bindSecondParam = $bindSecondParam . '$id';
				}
				if(NULL !== $so->getMenuId()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'menu_id = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'i';
					$bindSecondParam = $bindSecondParam . '$menuId';
				}
				if(NULL !== $so->getSeq()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'seq = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'i';
					$bindSecondParam = $bindSecondParam . '$seq';
				}
				if(NULL !== $so->getLv()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'lv = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'i';
					$bindSecondParam = $bindSecondParam . '$lv';
				}
				if(NULL !== $so->getLvMenuEn()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'lv_menu_en = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$lvMenuEn';
				}
				if(NULL !== $so->getLvMenuTc()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'lv_menu_tc = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$lvMenuTc';
				}
				if(NULL !== $so->getLvParentMenuId()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'lv_parent_menu_id = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'i';
					$bindSecondParam = $bindSecondParam . '$lvParentMenuId';
				}
				if(NULL !== $so->getIsShown()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'is_shown = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'i';
					$bindSecondParam = $bindSecondParam . '$isShown';
				}
				if(NULL !== $so->getIsEnabled()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'is_enabled = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'i';
					$bindSecondParam = $bindSecondParam . '$isEnabled';
				}
				if(NULL !== $so->getIsCategory()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'is_category = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'i';
					$bindSecondParam = $bindSecondParam . '$isCategory';
				}
				if(NULL !== $so->getUrl()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'url = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$url';
				}
				if(NULL !== $so->getCreatedBy()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'created_by = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$createdBy';
				}
				if(NULL !== $so->getUpdatedBy()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'updated_by = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$updatedBy';
				}
				if(NULL !== $so->getCreatedDate()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'created_date = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$createdDate';
				}
				if(NULL !== $so->getUpdatedDate()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'updated_date = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$updatedDate';
				}
				if(NULL !== $so->getRemarks()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'remarks = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$remarks';
				}
				if (NULL !== $so->getCreatedDateFrom() && NULL !== $so->getCreatedDateTo()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . '(created_date between ? and ?) ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'ss';
					$bindSecondParam = $bindSecondParam . '$createdDateFrom, $createDateTo';
				}
				if (NULL !== $so->getUpdatedDateFrom() && NULL !== $so->getUpdatedDateTo()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . '(updated_date between ? and ?) ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'ss';
					$bindSecondParam = $bindSecondParam . '$updatedDateFrom, $updatedDateTo';
				}
				if (NULL !== $so->getOrderBySoArray()){
					$selectSql = $selectSql . 'order by ';
					$orderBySoArray = $so->getOrderBySoArray();
					$n = 0;
					foreach ($orderBySoArray as $key => $value){
						$orderBySo = $value;
						$fieldName = $orderBySo->getisAsc();
						if($n > 0){
							$selectSql = $selectSql . ', ';
						}
						$selectSql = $selectSql . $fieldName . ' ';
						if ($isAsc){
							$selectSql = $selectSql . 'asc ';
						} else {
							$selectSql = $selectSql . 'desc ';
						}
						$n = $n + 1;
					}
				}
			}
			$stmt = $this->connection->prepare($selectSql);
			if ($stmt){
				if( NULL !== $bindFirstParam && NULL !== $bindSecondParam){
					$id = $so->getId();
					$menuId = $so->getMenuId();
					$seq = $so->getSeq();
					$lv = $so->getLv();
					$lvMenuEn = $so->getLvMenuEn();
					$lvMenuTc = $so->getLvMenuTc();
					$lvParentMenuId = $so->getLvParentMenuId();
					$isShown = $so->getIsShown();
					$isEnabled = $so->getIsEnabled();
					$isCategory = $so->getIsCategory();
					$url = $so->getUrl();
					$createdBy = $so->getCreatedBy();
					$updatedBy = $so->getUpdatedBy();
					$createdDate = $so->getCreatedDate();
					$updatedDate = $so->getUpdatedDate();
					$remarks = $so->getRemarks();
					$executeString = "\$stmt->bind_param(" . $bindFirstParam . "'," . $bindSecondParam. ");";
					//echo $executeString;
					eval($executeString);
				}
				$stmt->execute();
				$stmt->bind_result(
					$id,
					$menuId,
					$seq,
					$lv,
					$lvMenuEn,
					$lvMenuTc,
					$lvParentMenuId,
					$isShown,
					$isEnabled,
					$isCategory,
					$url,
					$createdBy,
					$updatedBy,
					$createdDate,
					$updatedDate,
					$remarks
				);
				while ($stmt->fetch()){
					if (!isset($categoryEoArray)){
						$categoryEoArray = array();
					}
					$categoryEo = new CategoryEo();
					$categoryEo->setId($id);
					$categoryEo->setMenuId($menuId);
					$categoryEo->setSeq($seq);
					$categoryEo->setLv($lv);
					$categoryEo->setLvMenuEn($lvMenuEn);
					$categoryEo->setLvMenuTc($lvMenuTc);
					$categoryEo->setLvParentMenuId($lvParentMenuId);
					$categoryEo->setIsShown($isShown);
					$categoryEo->setIsEnabled($isEnabled);
					$categoryEo->setIsCategory($isCategory);
					$categoryEo->setUrl($url);
					$categoryEo->setCreatedBy($createdBy);
					$categoryEo->setUpdatedBy($updatedBy);
					$categoryEo->setCreatedDate($createdDate);
					$categoryEo->setUpdatedDate($updatedDate);
					$categoryEo->setRemarks($remarks);
					array_push($categoryEoArray, $categoryEo);
				}
				$stmt->close();
				//print_r($categoryEoArray);
			}
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->select() - $so=' . $so, $ex );
			throw $ex;
		}
		return $categoryEoArray;
	}
	public function insert($eo){
		$id = NULL;
		try {
			$insertSql = $this->insertSql;
			$stmt = $this->connection->prepare($insertSql);
			if ($stmt){
				$id = $eo->getId();
				$menuId = $eo->getMenuId();
				$seq = $eo->getSeq();
				$lv = $eo->getLv();
				$lvMenuEn = $eo->getLvMenuEn();
				$lvMenuTc = $eo->getLvMenuTc();
				$lvParentMenuId = $eo->getLvParentMenuId();
				$isShown = $eo->getIsShown();
				$isEnabled = $eo->getIsEnabled();
				$isCategory = $eo->getIsCategory();
				$url = $eo->getUrl();
				$createdBy = $eo->getCreatedBy();
				$updatedBy = $eo->getUpdatedBy();
				$createdDate = $eo->getCreatedDate();
				$updatedDate = $eo->getUpdatedDate();
				$remarks = $eo->getRemarks();
				$stmt->bind_param('iiiissiiiissssss',
					$id,
					$menuId,
					$seq,
					$lv,
					$lvMenuEn,
					$lvMenuTc,
					$lvParentMenuId,
					$isShown,
					$isEnabled,
					$isCategory,
					$url,
					$createdBy,
					$updatedBy,
					$createdDate,
					$updatedDate,
					$remarks
				);
				$stmt->execute();
				if ($this->connection->insert_id) {
					$id = $this->connection->insert_id;
					$eo->setId($id);
				}
				$stmt->close();
			}
		} catch (Exception $ex){
			$this->logger->error ($this->className . '->insert() - $eo=' . $eo, $ex );
			throw $ex;
		}
		return $id;
	}
	public function update($eo){
		$rowCount = NULL;
		try {
			$updateSql = $this->updateSql;
			$stmt = $this->connection->prepare($updateSql);
			if ($stmt){
				$id = $eo->getId();
				$menuId = $eo->getMenuId();
				$seq = $eo->getSeq();
				$lv = $eo->getLv();
				$lvMenuEn = $eo->getLvMenuEn();
				$lvMenuTc = $eo->getLvMenuTc();
				$lvParentMenuId = $eo->getLvParentMenuId();
				$isShown = $eo->getIsShown();
				$isEnabled = $eo->getIsEnabled();
				$isCategory = $eo->getIsCategory();
				$url = $eo->getUrl();
				$createdBy = $eo->getCreatedBy();
				$updatedBy = $eo->getUpdatedBy();
				$createdDate = $eo->getCreatedDate();
				$updatedDate = $eo->getUpdatedDate();
				$remarks = $eo->getRemarks();
				$stmt->bind_param('iiiissiiiissssssi',
					$id,
					$menuId,
					$seq,
					$lv,
					$lvMenuEn,
					$lvMenuTc,
					$lvParentMenuId,
					$isShown,
					$isEnabled,
					$isCategory,
					$url,
					$createdBy,
					$updatedBy,
					$createdDate,
					$updatedDate,
					$remarks,
					$id
				);
				$stmt->execute();
				$rowCount = mysqli_affected_rows($this->connection);
				$stmt->close();
			}
		} catch (Exception $ex){
			$this->logger->error ($this->className . '->update() - $eo=' . $eo, $ex );
			throw $ex;
		}
		return $rowCount;
	}
	public function delete($eo){
		$rowCount = NULL;
		try {
			$deleteSql = $this->deleteSql;
			$stmt = $this->connection->prepare($deleteSql);
			if ($stmt){
				$id = $eo->getId();
				$menuId = $eo->getMenuId();
				$seq = $eo->getSeq();
				$lv = $eo->getLv();
				$lvMenuEn = $eo->getLvMenuEn();
				$lvMenuTc = $eo->getLvMenuTc();
				$lvParentMenuId = $eo->getLvParentMenuId();
				$isShown = $eo->getIsShown();
				$isEnabled = $eo->getIsEnabled();
				$isCategory = $eo->getIsCategory();
				$url = $eo->getUrl();
				$createdBy = $eo->getCreatedBy();
				$updatedBy = $eo->getUpdatedBy();
				$createdDate = $eo->getCreatedDate();
				$updatedDate = $eo->getUpdatedDate();
				$remarks = $eo->getRemarks();
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$rowCount = mysqli_affected_rows($this->connection);
				$stmt->close();
			}
		} catch (Exception $ex){
			$this->logger->error ($this->className . '->delete() - $eo=' . $eo, $ex );
			throw $ex;
		}
		return $rowCount;
	}
}
?>