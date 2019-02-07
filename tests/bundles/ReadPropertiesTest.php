<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once(UTILS_PATH . '/BundleUtils.php');

$bundleUtils = new BundleUtils();
$mysqlDbPropertiesArray = $bundleUtils->parseProperties("host=localhost");
print_r($mysqlDbPropertiesArray);
?>