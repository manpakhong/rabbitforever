<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (SERVICES_PATH . '/UserMgr.php');
include_once (SOS_PATH . '/UserSo.php');

$userMgr = new UserMgr();
$so = new UserSo();
$so->setUserName('emilywong');
$userEoArray = $userMgr->select($so);
print_r($userEoArray);
?>