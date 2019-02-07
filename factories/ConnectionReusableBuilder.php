<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (FRAMEWORK_PATH . '/Reusable.php');
include_once (FRAMEWORK_PATH . '/ReusableBuilder.php');
include_once (UTILS_PATH . '/SystemUtils.php');
include_once (UTILS_PATH . '/DateTimeUtils.php');
include_once (FACTORIES_PATH . '/ConnectionReusable.php');
include_once (FACTORIES_PATH . '/BundlesFactory.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
class ConnectionReusableBuilder extends ReusableBuilder {
	private $logger;
	private $className;
	private $dateTimeUtils;
	private static $reusableBuilder;
	private $currentCount;
	private $bundlesFactory;
	private $dbPropertiesEo;

	public static function getInstance() {
		if (! isset ( $reusableBuilder )) {
			$reusableBuilder = new ConnectionReusableBuilder ();
		}
		return $reusableBuilder;
	}
	private function __construct() {
		$this->className = __CLASS__;
		RabbitLogger::configure ();
		$this->logger = RabbitLogger::getLogger ( $this->className );
		$this->currentCount = 0;
		$this->bundlesFactory = BundlesFactory::getInstance();
		$this->dbPropertiesEo = $this->bundlesFactory->getInstanceOfDbPropertiesEo ();
		$this->dateTimeUtils = DateTimeUtils::getInstance();
	}
	public function buildReusable() {
		$reusable;
		try {
			$name = $this->dateTimeUtils->getNowString();
			$connection = $this->buildConnection();
			$reusable = new ConnectionReusable ( $connection );
			$this->currentCount = $this->currentCount + 1;
			$reusable->setName ( 'connection' . $name . $this->currentCount );
		} catch ( Exception $ex ) {
			$logger->error ( $this->className . '->buildReusable() - ', $ex );
			throw $ex;
		}
		return $reusable;
	}
	private function buildConnection() {
		$conn;
		try {
			$servername = $this->dbPropertiesEo->getHost();
			$username = $this->dbPropertiesEo->getUserName();
			$password = $this->dbPropertiesEo->getPassword();
			$schema = $this->dbPropertiesEo->getSchema();
// 			if (SystemUtils::getRealIpAddr () == '192.168.1.132' || SystemUtils::getRealIpAddr () == '127.0.0.1') {
// 				$servername = "localhost";
// 				$username = "root";
// 				$password = "PeppaPig0513";
// 			}
			// echo $servername . ',' . $username . ',' . $password . ',' . $schema;
			$conn = new mysqli ($servername,$username,$password,$schema);
			// Check connection
			if (! $conn) {
				die ( "Connection failed: " . mysqli_connect_error () );
			}
			/* change character set to utf8 */
			if (! $conn->set_charset ( "utf8" )) {
				printf ( "Error loading character set utf8: %s\n", $conn->error );
				exit ();
			} else {
				// printf("Current character set: %s\n", $conn->character_set_name());
			}
			
			// echo "Connected successfully" . "<br/>";
		} catch ( Exception $ex ) {
			$logger->error ( $this->className . '->buildConnection() - ', $ex );
			throw $ex;
		}
		return $conn;
	}
}
?>