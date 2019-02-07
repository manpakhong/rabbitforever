<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (BUILDERS_PATH . '/BundleBuilder.php');
include_once (BUILDERS_PATH . '/SystemConfigBundleBuilder.php');
defined ('PROPERTIES_SYS_CONFIG_FILE_NAME') or define('PROPERTIES_SYS_CONFIG_FILE_NAME', BUNDLES_PATH. '/system.config.properties');
defined ('PROPERTIES_PROD_FILE_NAME') or define('PROPERTIES_PROD_FILE_NAME', BUNDLES_PATH. '/mysql.db.prod.properties');
defined ('PROPERTIES_DEV_FILE_NAME') or define('PROPERTIES_DEV_FILE_NAME', BUNDLES_PATH. '/mysql.db.dev.properties');

// $systemConfigBundleBuilder = new SystemConfigBundleBuilder(PROPERTIES_SYS_CONFIG_FILE_NAME);
// $systemConfigBundleBuilder->buildBundle();
// $bundleEo = $systemConfigBundleBuilder->getBundleEo();
// print_r($bundleEo);

$systemConfigBundlesBuilder = new SystemConfigBundlesBuilder(PROPERTIES_PROD_FILE_NAME);
$systemConfigBundlesBuilder->buildBundle();
$bundleEo = $systemConfigBundleBuilder->getBundleEo();
print_r($bundleEo);
?>