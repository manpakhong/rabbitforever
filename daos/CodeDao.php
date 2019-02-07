<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( DAOS_PATH . '/Dao.php');
class CodeDao extends Dao{
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
		'cmn_code ';
		$this->selectSql =
		'select ' .
		'id, ' .
		'code, ' .
		'desc_en, ' .
		'desc_tc, ' .
		'code_type, ' .
		'created_by, ' .
		'updated_by, ' .
		'created_date, ' .
		'updated_date, ' .
		'remarks ' .
		'from ' .
		'cmn_code ';
		$this->insertSql =
		'insert into ' .
		'cmn_code' .
		'(' .
		'id, ' .
		'code, ' .
		'desc_en, ' .
		'desc_tc, ' .
		'code_type, ' .
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
		'? ' .
		');'; 
		$this->updateSql =
		'update ' .
		'cmn_code ' .
		'set ' .
		'id = ?, ' .
		'code = ?, ' .
		'desc_en = ?, ' .
		'desc_tc = ?, ' .
		'code_type = ?, ' .
		'created_by = ?, ' .
		'updated_by = ?, ' .
		'created_date = ?, ' .
		'updated_date = ?, ' .
		'remarks = ? ' .
		'where ' .
		'id = ? '; 
		$this->deleteSql =
		'delete from ' .
		'cmn_code ' .
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
		$codeEoArray = NULL;
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
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$id';
				}
				if(NULL !== $so->getCode()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'code = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$code';
				}
				if(NULL !== $so->getDescEn()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'desc_en = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$descEn';
				}
				if(NULL !== $so->getDescTc()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'desc_tc = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$descTc';
				}
				if(NULL !== $so->getCodeType()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'code_type = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$codeType';
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
					$code = $so->getCode();
					$descEn = $so->getDescEn();
					$descTc = $so->getDescTc();
					$codeType = $so->getCodeType();
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
					$code,
					$descEn,
					$descTc,
					$codeType,
					$createdBy,
					$updatedBy,
					$createdDate,
					$updatedDate,
					$remarks
				);
				while ($stmt->fetch()){
					if (!isset($codeEoArray)){
						$codeEoArray = array();
					}
					$codeEo = new CodeEo();
					$codeEo->setId($id);
					$codeEo->setCode($code);
					$codeEo->setDescEn($descEn);
					$codeEo->setDescTc($descTc);
					$codeEo->setCodeType($codeType);
					$codeEo->setCreatedBy($createdBy);
					$codeEo->setUpdatedBy($updatedBy);
					$codeEo->setCreatedDate($createdDate);
					$codeEo->setUpdatedDate($updatedDate);
					$codeEo->setRemarks($remarks);
					array_push($codeEoArray, $codeEo);
				}
				$stmt->close();
				//print_r($codeEoArray);
			}
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->select() - $so=' . $so, $ex );
			throw $ex;
		}
		return $codeEoArray;
	}
	public function insert($eo){
		$id = NULL;
		try {
			$insertSql = $this->insertSql;
			$stmt = $this->connection->prepare($insertSql);
			if ($stmt){
				$id = $eo->getId();
				$code = $eo->getCode();
				$descEn = $eo->getDescEn();
				$descTc = $eo->getDescTc();
				$codeType = $eo->getCodeType();
				$createdBy = $eo->getCreatedBy();
				$updatedBy = $eo->getUpdatedBy();
				$createdDate = $eo->getCreatedDate();
				$updatedDate = $eo->getUpdatedDate();
				$remarks = $eo->getRemarks();
				$stmt->bind_param('ssssssssss',
					$id,
					$code,
					$descEn,
					$descTc,
					$codeType,
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
				$code = $eo->getCode();
				$descEn = $eo->getDescEn();
				$descTc = $eo->getDescTc();
				$codeType = $eo->getCodeType();
				$createdBy = $eo->getCreatedBy();
				$updatedBy = $eo->getUpdatedBy();
				$createdDate = $eo->getCreatedDate();
				$updatedDate = $eo->getUpdatedDate();
				$remarks = $eo->getRemarks();
				$stmt->bind_param('ssssssssss',
					$id,
					$code,
					$descEn,
					$descTc,
					$codeType,
					$createdBy,
					$updatedBy,
					$createdDate,
					$updatedDate,
					$remarks
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
				$code = $eo->getCode();
				$descEn = $eo->getDescEn();
				$descTc = $eo->getDescTc();
				$codeType = $eo->getCodeType();
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