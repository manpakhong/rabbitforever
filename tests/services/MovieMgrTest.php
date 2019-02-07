<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (DAOS_PATH . '/MovieDao.php');
include_once (EOS_PATH . '/MovieEo.php');
include_once (SOS_PATH . '/MovieSo.php');
include_once (SERVICES_PATH . '/MovieMgr.php');

$movieMgr = new MovieMgr();
$so = new MovieSo();
$so->setMovieNameTc('%地%');
$movieEoArray = $movieMgr->selectLike($so);
print_r($movieEoArray);
?>