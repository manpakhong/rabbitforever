<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (SERVICES_PATH . '/CodeMgr.php');
include_once (SOS_PATH . '/CodeSo.php');
include_once (EOS_PATH . '/CodeEo.php');
$codeMgr = new CodeMgr();
$so = new CodeSo();
$so->setCodeType(CodeEo::$CODE_TYPE_MOVIE_TYPE);
$codeEoArray = $codeMgr->select($so);
print_r($codeEoArray);
?>