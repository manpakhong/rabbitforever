<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (DAOS_PATH . '/MenuDao.php');
include_once (EOS_PATH . '/MenuEo.php');

$menuDao = new MenuDao();

$menuEo = new MenuEo();
$menuEo->setId(7);
$menuEo->setMenuId(50);
$menuEo->setSeq(0);
$menuEo->setLv(2);
$menuEo->setLvMenuEn("uTest");
$menuEo->setLvMenuTc("ด๚ธี");
$menuEo->setLvParentMenuId(1);
$menuEo->setIsShown(1);
$menuEo->setIsEnabled(1);
$menuEo->setUrl("http://www.yahoo.com");
$menuEo->setCreatedDate(date("Y-m-d H:i:s"));
$menuEo->setUpdatedDate(date("Y-m-d H:i:s"));
$menuEo->setRemarks("remarks");
// $menuDao->update($menuEo);
// $menuDao->insert($menuEo);
$deleteRowCount = $menuDao->delete($menuEo);
print( '$deleteRowCount = ' . $deleteRowCount );
$menuDao->select(NULL);
?>