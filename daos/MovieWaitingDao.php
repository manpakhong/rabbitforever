<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( DAOS_PATH . '/Dao.php');
class MovieWaitingDao extends Dao{
	private $className;
	private $logger;
	private $selectCountSql;
	private $selectMaxSql;
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
		$this->selectCountSql =
		'select ' .
		'count(0) as count_all ' .
		'from ' .
		'cmn_movie_waiting ';
		$this->selectMaxSql =
		'select ' .
		'max(id) as max_id ' .
		'from ' .
		'cmn_movie_waiting ';
		$this->selectSql =
		'select ' .
		'id, ' .
		'movie_id, ' .
		'waiting_seq, ' .
		'status, ' .
		'created_by, ' .
		'updated_by, ' .
		'created_date, ' .
		'updated_date, ' .
		'remarks ' .
		'from ' .
		'cmn_movie_waiting ';
		$this->insertSql =
		'insert into ' .
		'cmn_movie_waiting' .
		'(' .
		'id, ' .
		'movie_id, ' .
		'waiting_seq, ' .
		'status, ' .
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
		'? ' .
		');'; 
		$this->updateSql =
		'update ' .
		'cmn_movie_waiting ' .
		'set ' .
		'id = ?, ' .
		'movie_id = ?, ' .
		'waiting_seq = ?, ' .
		'status = ?, ' .
		'created_by = ?, ' .
		'updated_by = ?, ' .
		'created_date = ?, ' .
		'updated_date = ?, ' .
		'remarks = ? ' .
		'where ' .
		'id = ? '; 
		$this->deleteSql =
		'delete from ' .
		'cmn_movie_waiting ' .
		'where ' .
		'id = ? '; 
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	public function selectCount($so){
		$returnCount = NULL;
		$bindFirstParam = NULL;
		$bindSecondParam = NULL;
		try {
			$selectCountSql = $this->selectCountSql;
			if (isset($so)){
				$i = 0;
				if(NULL !== $so->getId()){
					if ($i == 0){
						$selectCountSql = $selectCountSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectCountSql = $selectCountSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . 'id = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'i';
					$bindSecondParam = $bindSecondParam . '$id';
				}
				if(NULL !== $so->getMovieId()){
					if ($i == 0){
						$selectCountSql = $selectCountSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectCountSql = $selectCountSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . 'movie_id = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'i';
					$bindSecondParam = $bindSecondParam . '$movieId';
				}
				if(NULL !== $so->getWaitingSeq()){
					if ($i == 0){
						$selectCountSql = $selectCountSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectCountSql = $selectCountSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . 'waiting_seq = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'i';
					$bindSecondParam = $bindSecondParam . '$waitingSeq';
				}
				if(NULL !== $so->getStatus()){
					if ($i == 0){
						$selectCountSql = $selectCountSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectCountSql = $selectCountSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . 'status = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$status';
				}
				if(NULL !== $so->getCreatedBy()){
					if ($i == 0){
						$selectCountSql = $selectCountSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectCountSql = $selectCountSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . 'created_by = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$createdBy';
				}
				if(NULL !== $so->getUpdatedBy()){
					if ($i == 0){
						$selectCountSql = $selectCountSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectCountSql = $selectCountSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . 'updated_by = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$updatedBy';
				}
				if(NULL !== $so->getCreatedDate()){
					if ($i == 0){
						$selectCountSql = $selectCountSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectCountSql = $selectCountSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . 'created_date = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$createdDate';
				}
				if(NULL !== $so->getUpdatedDate()){
					if ($i == 0){
						$selectCountSql = $selectCountSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectCountSql = $selectCountSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . 'updated_date = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$updatedDate';
				}
				if(NULL !== $so->getRemarks()){
					if ($i == 0){
						$selectCountSql = $selectCountSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectCountSql = $selectCountSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . 'remarks = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$remarks';
				}
				if (NULL !== $so->getCreatedDateFrom() && NULL !== $so->getCreatedDateTo()){
					if ($i == 0){
						$selectCountSql = $selectCountSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectCountSql = $selectCountSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . '(created_date between ? and ?) ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'ss';
					$bindSecondParam = $bindSecondParam . '$createdDateFrom, $createDateTo';
				}
				if (NULL !== $so->getUpdatedDateFrom() && NULL !== $so->getUpdatedDateTo()){
					if ($i == 0){
						$selectCountSql = $selectCountSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectCountSql = $selectCountSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . '(updated_date between ? and ?) ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'ss';
					$bindSecondParam = $bindSecondParam . '$updatedDateFrom, $updatedDateTo';
				}
				if (NULL !== $so->getOrderBySoArray()){
					$selectCountSql = $selectCountSql . 'order by ';
					$orderBySoArray = $so->getOrderBySoArray();
					$n = 0;
					foreach ($orderBySoArray as $key => $value){
						$orderBySo = $value;
						$fieldName = $orderBySo->getFieldName();
						$isAsc = $orderBySo->getIsAsc();
						if($n > 0){
							$selectCountSql = $selectCountSql . ', ';
						}
						$selectCountSql = $selectCountSql . $fieldName . ' ';
						if ($isAsc){
							$selectCountSql = $selectCountSql . 'asc ';
						} else {
							$selectCountSql = $selectCountSql . 'desc ';
						}
						$n = $n + 1;
					}
				}
				if (NULL !== $so->getLimitFrom() && NULL !== $so->getLimitOffset()){
					$limitFrom = $so->getLimitFrom();
					$limitOffset = $so->getLimitOffset();
					if ($i == 0){
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . 'limit ?, ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'ii';
					$bindSecondParam = $bindSecondParam . '$limitFrom, $limitOffset';
				}
			}
			$stmt = $this->connection->prepare($selectCountSql);
			if ($stmt){
				if( NULL !== $bindFirstParam && NULL !== $bindSecondParam){
					$id = $so->getId();
					$movieId = $so->getMovieId();
					$waitingSeq = $so->getWaitingSeq();
					$status = $so->getStatus();
					$createdBy = $so->getCreatedBy();
					$updatedBy = $so->getUpdatedBy();
					$createdDate = $so->getCreatedDate();
					$updatedDate = $so->getUpdatedDate();
					$remarks = $so->getRemarks();
					$limitFrom = $so->getLimitFrom();
					$limitOffset = $so->getLimitOffset();
					$executeString = "\$stmt->bind_param(" . $bindFirstParam . "'," . $bindSecondParam. ");";
					//echo $executeString;
					eval($executeString);
				}
				$stmt->execute();
				$stmt->bind_result(
					$count
				);
				while ($stmt->fetch()){
					$returnCount = $count;
				}
				while ($stmt->fetch()){
					if (!isset($movieWaitingEoArray)){
						$movieWaitingEoArray = array();
					}
					$movieWaitingEo = new MovieWaitingEo();
					$movieWaitingEo->setId($id);
					$movieWaitingEo->setMovieId($movieId);
					$movieWaitingEo->setWaitingSeq($waitingSeq);
					$movieWaitingEo->setStatus($status);
					$movieWaitingEo->setCreatedBy($createdBy);
					$movieWaitingEo->setUpdatedBy($updatedBy);
					$movieWaitingEo->setCreatedDate($createdDate);
					$movieWaitingEo->setUpdatedDate($updatedDate);
					$movieWaitingEo->setRemarks($remarks);
					array_push($movieWaitingEoArray, $movieWaitingEo);
				}
				$stmt->close();
				//print_r($returnCount);
			}
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->selectCount() - $so=' . print_r($so, 1), $ex );
			throw $ex;
		}
		return $returnCount;
	}
	public function selectMaxId(){
		$returnMaxId = NULL;
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
		return $returnMaxId;
	}
	
	public function batchSelectNotInSoMovieIdArray($so){
		$movieWaitingEoArray = NULL;
		try {
			$selectSql = $this->selectSql;
			if (isset($so)){
				$idArray = $so->getMovieIdArray();
				if (isset($idArray)){
					$selectSql .= 'where ';
					$selectSql .= 'movie_id not in ';
					$selectSql .= '(';
					$idArrayCount = count($idArray);
					if ($idArrayCount > 0){
						$i =0;
						foreach($idArray as $key=>$value){
							if($i > 0){
								$selectSql .= ',';
							}
							$selectSql .= $value;
							$i++;
						}
						$selectSql .= ') ';
						$stmt = $this->connection->prepare($selectSql);
						if ($stmt){
							$stmt->execute();
							$stmt->bind_result(
									$id,
									$movieId,
									$waitingSeq,
									$status,
									$createdBy,
									$updatedBy,
									$createdDate,
									$updatedDate,
									$remarks
									);
							while ($stmt->fetch()){
								if (!isset($movieWaitingEoArray)){
									$movieWaitingEoArray = array();
								}
								$movieWaitingEo = new MovieWaitingEo();
								$movieWaitingEo->setId($id);
								$movieWaitingEo->setMovieId($movieId);
								$movieWaitingEo->setWaitingSeq($waitingSeq);
								$movieWaitingEo->setStatus($status);
								$movieWaitingEo->setCreatedBy($createdBy);
								$movieWaitingEo->setUpdatedBy($updatedBy);
								$movieWaitingEo->setCreatedDate($createdDate);
								$movieWaitingEo->setUpdatedDate($updatedDate);
								$movieWaitingEo->setRemarks($remarks);
								array_push($movieWaitingEoArray, $movieWaitingEo);
							}
							$stmt->close();
							//print_r($movieWaitingEoArray);
						}
					}
				}
			}
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->batchSelectNotInSoMovieIdArray() - $so=' . print_r($so, 1), $ex );
			throw $ex;
		}
		return $movieWaitingEoArray;
	}
	
	public function batchSelectNotInSoIdArray($so){
		$movieWaitingEoArray = NULL;
		try {
			$selectSql = $this->selectSql;
			if (isset($so)){
				$idArray = $so->getIdArray();
				if (isset($idArray)){
					$selectSql .= 'where ';
					$selectSql .= 'id not in ';
					$selectSql .= '(';
					$idArrayCount = count($idArray);
					if ($idArrayCount > 0){
						$i =0;
						foreach($idArray as $key=>$value){
							if($i > 0){
								$selectSql .= ',';
							}
							$selectSql .= $value;
							$i++;
						}
						$selectSql .= ') ';
						$stmt = $this->connection->prepare($selectSql);
						if ($stmt){
							$stmt->execute();
							$stmt->bind_result(
									$id,
									$movieId,
									$waitingSeq,
									$status,
									$createdBy,
									$updatedBy,
									$createdDate,
									$updatedDate,
									$remarks
									);
							while ($stmt->fetch()){
								if (!isset($movieWaitingEoArray)){
									$movieWaitingEoArray = array();
								}
								$movieWaitingEo = new MovieWaitingEo();
								$movieWaitingEo->setId($id);
								$movieWaitingEo->setMovieId($movieId);
								$movieWaitingEo->setWaitingSeq($waitingSeq);
								$movieWaitingEo->setStatus($status);
								$movieWaitingEo->setCreatedBy($createdBy);
								$movieWaitingEo->setUpdatedBy($updatedBy);
								$movieWaitingEo->setCreatedDate($createdDate);
								$movieWaitingEo->setUpdatedDate($updatedDate);
								$movieWaitingEo->setRemarks($remarks);
								array_push($movieWaitingEoArray, $movieWaitingEo);
							}
							$stmt->close();
							//print_r($movieWaitingEoArray);
						}
					}
				}
			}
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->batchSelectNotInSoIdArray() - $so=' . print_r($so, 1), $ex );
			throw $ex;
		}
		return $movieWaitingEoArray;
	}
	
	public function batchSelectBySoIdArray($so){
		$movieWaitingEoArray = NULL;
		try {
			$selectSql = $this->selectSql;
			if (isset($so)){
				$idArray = $so->getIdArray();
				if (isset($idArray)){
					$selectSql .= 'where ';
					$selectSql .= 'id in ';
					$selectSql .= '(';
					$idArrayCount = count($idArray);
					if ($idArrayCount > 0){
						$i =0;
						foreach($idArray as $key=>$value){
							if($i > 0){
								$selectSql .= ',';
							}
							$selectSql .= $value;
							$i++;
						}
						$selectSql .= ') ';
						$stmt = $this->connection->prepare($selectSql);
						if ($stmt){
							$stmt->execute();
							$stmt->bind_result(
									$id,
									$movieId,
									$waitingSeq,
									$status,
									$createdBy,
									$updatedBy,
									$createdDate,
									$updatedDate,
									$remarks
									);
							while ($stmt->fetch()){
								if (!isset($movieWaitingEoArray)){
									$movieWaitingEoArray = array();
								}
								$movieWaitingEo = new MovieWaitingEo();
								$movieWaitingEo->setId($id);
								$movieWaitingEo->setMovieId($movieId);
								$movieWaitingEo->setWaitingSeq($waitingSeq);
								$movieWaitingEo->setStatus($status);
								$movieWaitingEo->setCreatedBy($createdBy);
								$movieWaitingEo->setUpdatedBy($updatedBy);
								$movieWaitingEo->setCreatedDate($createdDate);
								$movieWaitingEo->setUpdatedDate($updatedDate);
								$movieWaitingEo->setRemarks($remarks);
								array_push($movieWaitingEoArray, $movieWaitingEo);
							}
							$stmt->close();
							//print_r($movieWaitingEoArray);
						}
					}
				}
			}
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->batchSelectBySoIdArray() - $so=' . print_r($so, 1), $ex );
			throw $ex;
		}
		return $movieWaitingEoArray;
	}
	
	public function select($so){
		$movieWaitingEoArray = NULL;
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
				if(NULL !== $so->getMovieId()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'movie_id = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'i';
					$bindSecondParam = $bindSecondParam . '$movieId';
				}
				if(NULL !== $so->getWaitingSeq()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'waiting_seq = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'i';
					$bindSecondParam = $bindSecondParam . '$waitingSeq';
				}
				if(NULL !== $so->getStatus()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'status = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$status';
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
						$fieldName = $orderBySo->getFieldName();
						$isAsc = $orderBySo->getIsAsc();
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
				if (NULL !== $so->getLimitFrom() && NULL !== $so->getLimitOffset()){
					$limitFrom = $so->getLimitFrom();
					$limitOffset = $so->getLimitOffset();
					if ($i == 0){
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'limit ?, ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 'ii';
					$bindSecondParam = $bindSecondParam . '$limitFrom, $limitOffset';
				}
			}
			$stmt = $this->connection->prepare($selectSql);
			if ($stmt){
				if( NULL !== $bindFirstParam && NULL !== $bindSecondParam){
					$id = $so->getId();
					$movieId = $so->getMovieId();
					$waitingSeq = $so->getWaitingSeq();
					$status = $so->getStatus();
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
					$movieId,
					$waitingSeq,
					$status,
					$createdBy,
					$updatedBy,
					$createdDate,
					$updatedDate,
					$remarks
				);
				while ($stmt->fetch()){
					if (!isset($movieWaitingEoArray)){
						$movieWaitingEoArray = array();
					}
					$movieWaitingEo = new MovieWaitingEo();
					$movieWaitingEo->setId($id);
					$movieWaitingEo->setMovieId($movieId);
					$movieWaitingEo->setWaitingSeq($waitingSeq);
					$movieWaitingEo->setStatus($status);
					$movieWaitingEo->setCreatedBy($createdBy);
					$movieWaitingEo->setUpdatedBy($updatedBy);
					$movieWaitingEo->setCreatedDate($createdDate);
					$movieWaitingEo->setUpdatedDate($updatedDate);
					$movieWaitingEo->setRemarks($remarks);
					array_push($movieWaitingEoArray, $movieWaitingEo);
				}
				$stmt->close();
				//print_r($movieWaitingEoArray);
			}
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->select() - $so=' . print_r($so, 1), $ex );
			throw $ex;
		}
		return $movieWaitingEoArray;
	}
	public function insert($eo){
		$id = NULL;
		try {
			$insertSql = $this->insertSql;
			$stmt = $this->connection->prepare($insertSql);
			if ($stmt){
				$id = $eo->getId();
				$movieId = $eo->getMovieId();
				$waitingSeq = $eo->getWaitingSeq();
				$status = $eo->getStatus();
				$createdBy = $eo->getCreatedBy();
				$updatedBy = $eo->getUpdatedBy();
				$createdDate = $eo->getCreatedDate();
				$updatedDate = $eo->getUpdatedDate();
				$remarks = $eo->getRemarks();
				$stmt->bind_param('iiissssss',
					$id,
					$movieId,
					$waitingSeq,
					$status,
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
			$this->logger->error ($this->className . '->insert() - $eo=' . print_r($eo,1), $ex );
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
				$movieId = $eo->getMovieId();
				$waitingSeq = $eo->getWaitingSeq();
				$status = $eo->getStatus();
				$createdBy = $eo->getCreatedBy();
				$updatedBy = $eo->getUpdatedBy();
				$createdDate = $eo->getCreatedDate();
				$updatedDate = $eo->getUpdatedDate();
				$remarks = $eo->getRemarks();
				$stmt->bind_param('iiissssssi',
					$id,
					$movieId,
					$waitingSeq,
					$status,
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
			$this->logger->error ($this->className . '->update() - $eo=' . print_r($eo, 1), $ex );
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
				$movieId = $eo->getMovieId();
				$waitingSeq = $eo->getWaitingSeq();
				$status = $eo->getStatus();
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
			$this->logger->error ($this->className . '->delete() - $eo=' . print_r($eo, 1), $ex );
			throw $ex;
		}
		return $rowCount;
	}

}
?>