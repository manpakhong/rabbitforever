<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (SERVICES_PATH . '/MovieWaitingMgr.php');
include_once (SOS_PATH . '/MovieWaitingSo.php');
include_once (EOS_PATH . '/MovieWaitingEo.php');
$movieWaitingMgr = new MovieWaitingMgr();
$so = new MovieWaitingSo();
$movieWaitingEoArray = $movieWaitingMgr->selectVo($so);
print_r($movieWaitingEoArray);
?>