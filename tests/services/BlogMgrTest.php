<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (LOG4PHP_PATH . '/RabbitLogger.php');
include_once (SERVICES_PATH . '/BlogMgr.php');
include_once (SOS_PATH . '/BlogSo.php');
include_once (SOS_PATH . '/OrderBySo.php');
include_once (FACTORIES_PATH . '/BundlesFactory.php');

$bundlesFactory = BundlesFactory::getInstance();
$systemConfigEo = $bundlesFactory->getInstanceOfSystemConfigEo();

$blogMgr = new BlogMgr();
$so = new BlogSo();
$so->setId(1);
$count = $blogMgr->selectCount($so);
echo 'count=' . $count . '<br/>';
echo 'records per page=' . $systemConfigEo->getDefaultBlogRecordsPerPage() . '<br/>';
echo 'number of page=' . ceil($count / $systemConfigEo->getDefaultBlogRecordsPerPage()) . '<br/>';
$so = new BlogSo();
$so->setLimitFrom(3);
$so->setLimitOffset(3);
$orderBySo = new OrderBySo();
$orderBySo->setFieldName('blog_date');
$orderBySo->setIsAsc(false);
$so->addOrderBySo($orderBySo);
$blogArray = $blogMgr->select($so);
print_r($blogArray);
?>