<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (SERVICES_PATH . '/CategoryMgr.php');
include_once (SOS_PATH . '/CategorySo.php');

$categoryMgr = new CategoryMgr();
// $so = new CategorySo();
// $so->setMenuId(221);

$so = new CategorySo();
$so->setLv(1);
$so->setLvParentMenuId(2);
$so->setIsShown(TRUE);
$so->setIsEnabled(TRUE);
$so->setIsCategory(TRUE);

$categoryEoArray = $categoryMgr->select($so);
print_r($categoryEoArray);

$menuId = 221;
// $categoryEoAccumulatedArray = $categoryMgr->getCategoryEoAccumulatedArray($menuId);
// print_r($categoryEoAccumulatedArray);

$categoryEoString = $categoryMgr->getCategoryEoDisplayString($menuId);
echo '<br/>categoryEoString: ' . $categoryEoString;
?>