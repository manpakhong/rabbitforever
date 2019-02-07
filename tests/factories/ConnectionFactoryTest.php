<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (FACTORIES_PATH . '/ConnectionFactory.php');

$connectionFactory = ConnectionFactory::getInstance();
$connection = $connectionFactory->getConnection();
?>