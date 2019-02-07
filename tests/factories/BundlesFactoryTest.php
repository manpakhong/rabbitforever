<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (FACTORIES_PATH . '/BundlesFactory.php');

$bundlesFactory = BundlesFactory::getInstance();
// $dbPropertiesEo = $bundlesFactory->getInstanceOfDbPropertiesEo();
// print_r($dbPropertiesEo);

$movieWaitingPageBundlesEo = $bundlesFactory->getInstanceOfMovieWaitingPageBundlesEo();
print_r($movieWaitingPageBundlesEo);
?>