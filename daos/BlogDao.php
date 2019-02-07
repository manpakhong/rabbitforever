<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( DAOS_PATH . '/Dao.php');
class BlogDao extends Dao{
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
		'cmn_blog ';
		$this->selectMaxSql =
		'select ' .
		'max(id) as max_id ' .
		'from ' .
		'cmn_blog ';
		$this->selectSql =
		'select ' .
		'id, ' .
		'blog_date, ' .
		'subject, ' .
		'content, ' .
		'content_cm, ' .
		'language_code, ' .
		'category_id, ' .
		'created_by, ' .
		'updated_by, ' .
		'created_date, ' .
		'updated_date, ' .
		'remarks ' .
		'from ' .
		'cmn_blog ';
		$this->insertSql =
		'insert into ' .
		'cmn_blog' .
		'(' .
		'id, ' .
		'blog_date, ' .
		'subject, ' .
		'content, ' .
		'content_cm, ' .
		'language_code, ' .
		'category_id, ' .
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
		'? ' .
		');'; 
		$this->updateSql =
		'update ' .
		'cmn_blog ' .
		'set ' .
		'id = ?, ' .
		'blog_date = ?, ' .
		'subject = ?, ' .
		'content = ?, ' .
		'content_cm = ?, ' .
		'language_code = ?, ' .
		'category_id = ?, ' .
		'created_by = ?, ' .
		'updated_by = ?, ' .
		'created_date = ?, ' .
		'updated_date = ?, ' .
		'remarks = ? ' .
		'where ' .
		'id = ? '; 
		$this->deleteSql =
		'delete from ' .
		'cmn_blog ' .
		'where ' .
		'id = ? '; 
	}
	private function fillClassName(){
		if(!isset($this->className)){
			$this->className = __CLASS__;
		}
	}
	public function selectCount($so){
		$blogEoArray = NULL;
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
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$id';
				}
				if(NULL !== $so->getBlogDate()){
					if ($i == 0){
						$selectCountSql = $selectCountSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectCountSql = $selectCountSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . 'blog_date = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$blogDate';
				}
				if(NULL !== $so->getSubject()){
					if ($i == 0){
						$selectCountSql = $selectCountSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectCountSql = $selectCountSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . 'subject = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$subject';
				}
				if(NULL !== $so->getContent()){
					if ($i == 0){
						$selectCountSql = $selectCountSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectCountSql = $selectCountSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . 'content = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$content';
				}
				if(NULL !== $so->getContentCm()){
					if ($i == 0){
						$selectCountSql = $selectCountSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectCountSql = $selectCountSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . 'content_cm = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$contentCm';
				}
				if(NULL !== $so->getLanguageCode()){
					if ($i == 0){
						$selectCountSql = $selectCountSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectCountSql = $selectCountSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . 'language_code = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$languageCode';
				}
				if(NULL !== $so->getCategoryId()){
					if ($i == 0){
						$selectCountSql = $selectCountSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectCountSql = $selectCountSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectCountSql = $selectCountSql . 'category_id = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$categoryId';
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
					$blogDate = $so->getBlogDate();
					$subject = $so->getSubject();
					$content = $so->getContent();
					$contentCm = $so->getContentCm();
					$languageCode = $so->getLanguageCode();
					$categoryId = $so->getCategoryId();
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
					if (!isset($blogEoArray)){
						$blogEoArray = array();
					}
					$blogEo = new BlogEo();
					$blogEo->setId($id);
					$blogEo->setBlogDate($blogDate);
					$blogEo->setSubject($subject);
					$blogEo->setContent($content);
					$blogEo->setContentCm($contentCm);
					$blogEo->setLanguageCode($languageCode);
					$blogEo->setCategoryId($categoryId);
					$blogEo->setCreatedBy($createdBy);
					$blogEo->setUpdatedBy($updatedBy);
					$blogEo->setCreatedDate($createdDate);
					$blogEo->setUpdatedDate($updatedDate);
					$blogEo->setRemarks($remarks);
					array_push($blogEoArray, $blogEo);
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
	public function select($so){
		$blogEoArray = NULL;
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
				if(NULL !== $so->getBlogDate()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'blog_date = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$blogDate';
				}
				if(NULL !== $so->getSubject()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'subject = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$subject';
				}
				if(NULL !== $so->getContent()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'content = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$content';
				}
				if(NULL !== $so->getContentCm()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'content_cm = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$contentCm';
				}
				if(NULL !== $so->getLanguageCode()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'language_code = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$languageCode';
				}
				if(NULL !== $so->getCategoryId()){
					if ($i == 0){
						$selectSql = $selectSql . 'where ';
						$bindFirstParam = "'";
						$bindSecondParam = '';
					} else {
						$selectSql = $selectSql . 'and ';
						$bindSecondParam = $bindSecondParam . ', ';
					}
					$selectSql = $selectSql . 'category_id = ? ';
					$i = $i + 1;
					$bindFirstParam = $bindFirstParam . 's';
					$bindSecondParam = $bindSecondParam . '$categoryId';
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
// 			echo 'selectSql=' . $selectSql;
			$stmt = $this->connection->prepare($selectSql);
			if ($stmt){
				if( NULL !== $bindFirstParam && NULL !== $bindSecondParam){
					$id = $so->getId();
					$blogDate = $so->getBlogDate();
					$subject = $so->getSubject();
					$content = $so->getContent();
					$contentCm = $so->getContentCm();
					$languageCode = $so->getLanguageCode();
					$categoryId = $so->getCategoryId();
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
					$blogDate,
					$subject,
					$content,
					$contentCm,
					$languageCode,
					$categoryId,
					$createdBy,
					$updatedBy,
					$createdDate,
					$updatedDate,
					$remarks
				);
				while ($stmt->fetch()){
					if (!isset($blogEoArray)){
						$blogEoArray = array();
					}
					$blogEo = new BlogEo();
					$blogEo->setId($id);
					$blogEo->setBlogDate($blogDate);
					$blogEo->setSubject($subject);
					$blogEo->setContent($content);
					$blogEo->setContentCm($contentCm);
					$blogEo->setLanguageCode($languageCode);
					$blogEo->setCategoryId($categoryId);
					$blogEo->setCreatedBy($createdBy);
					$blogEo->setUpdatedBy($updatedBy);
					$blogEo->setCreatedDate($createdDate);
					$blogEo->setUpdatedDate($updatedDate);
					$blogEo->setRemarks($remarks);
					array_push($blogEoArray, $blogEo);
				}
				$stmt->close();
				//print_r($blogEoArray);
			}
		} catch ( Exception $ex ){
			$this->logger->error ($this->className . '->select() - $so=' . print_r($so, 1), $ex );
			throw $ex;
		}
		return $blogEoArray;
	}
	public function insert($eo){
		$id = NULL;
		try {
			$insertSql = $this->insertSql;
			$stmt = $this->connection->prepare($insertSql);
			if ($stmt){
				$id = $eo->getId();
				$blogDate = $eo->getBlogDate();
				$subject = $eo->getSubject();
				$content = $eo->getContent();
				$contentCm = $eo->getContentCm();
				$languageCode = $eo->getLanguageCode();
				$categoryId = $eo->getCategoryId();
				$createdBy = $eo->getCreatedBy();
				$updatedBy = $eo->getUpdatedBy();
				$createdDate = $eo->getCreatedDate();
				$updatedDate = $eo->getUpdatedDate();
				$remarks = $eo->getRemarks();
				$stmt->bind_param('isssssisssss',
					$id,
					$blogDate,
					$subject,
					$content,
					$contentCm,
					$languageCode,
					$categoryId,
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
				$blogDate = $eo->getBlogDate();
				$subject = $eo->getSubject();
				$content = $eo->getContent();
				$contentCm = $eo->getContentCm();
				$languageCode = $eo->getLanguageCode();
				$categoryId = $eo->getCategoryId();
				$createdBy = $eo->getCreatedBy();
				$updatedBy = $eo->getUpdatedBy();
				$createdDate = $eo->getCreatedDate();
				$updatedDate = $eo->getUpdatedDate();
				$remarks = $eo->getRemarks();
				$stmt->bind_param('isssssisssssi',
					$id,
					$blogDate,
					$subject,
					$content,
					$contentCm,
					$languageCode,
					$categoryId,
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
				$blogDate = $eo->getBlogDate();
				$subject = $eo->getSubject();
				$content = $eo->getContent();
				$contentCm = $eo->getContentCm();
				$languageCode = $eo->getLanguageCode();
				$categoryId = $eo->getCategoryId();
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