<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once (UTILS_PATH . '/FileUtils.php');
include_once (FACTORIES_PATH . '/BundlesFactory.php');
$fileUtils = new FileUtils ();
// $fileName = BUNDLES_PATH . '/mysql.db.prod.properties';
// $fileContent = $fileUtils->readTextFile ( $fileName );
// print_r ( $fileContent );
$bundlesFactory = BundlesFactory::getInstance();
$systemConfigEo = $bundlesFactory->getInstanceOfSystemConfigEo();
$backgroundsPath = $systemConfigEo->getBackgroundsPath();
$directory = IMAGES_PATH . '/' . $backgroundsPath;
$fileArray = $fileUtils->getFileArrayInDirectory($directory);
$fileName = $fileUtils->getRandomFileNameInFileArray($fileArray);
print_r($fileArray);
echo '<br/>file picked out: ' . $fileName;
?>