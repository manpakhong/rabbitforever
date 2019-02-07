<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (SERVICES_PATH . '/MenuMgr.php');
include_once (SOS_PATH . '/MenuSo.php');

$menuMgr = new MenuMgr();

$menuEo = new MenuEo();
$menuEo->setId(NULL);
$menuEo->setMenuId(50);
$menuEo->setSeq(0);
$menuEo->setLv(2);
$menuEo->setLvMenuEn("Test");
$menuEo->setLvMenuTc("測試");
$menuEo->setLvParentMenuId(1);
$menuEo->setIsShown(1);
$menuEo->setIsEnabled(1);
$menuEo->setUrl("http://www.yahoo.com");
$menuEo->setCreatedDate(date("Y-m-d H:i:s"));
$menuEo->setUpdatedDate(date("Y-m-d H:i:s"));
$menuEo->setRemarks("remarks");

$id = $menuMgr->insert($menuEo);
echo 'inserted $id = ' . $id . "<br/>";

$menuEo->setId($id);
$menuEo->setLvMenuEn("Test changed");
$menuEo->setLvMenuTc("測試改變");
$menuMgr->update($menuEo);


$menuSo = new MenuSo();
$menuSo->setId($id);
$menuEoArray = $menuMgr->select($menuSo);
$menuEo = $menuEoArray[0];
print_r($menuEo);

$affectedRows = $menuMgr->delete($menuEo);
echo 'deleted rows = '. $affectedRows;

?>