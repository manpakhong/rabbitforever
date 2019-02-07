<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (UTILS_PATH . '/DateTimeUtils.php');

$logger = RabbitLogger::getLogger('DateTimeUtilsTest');
$dateTimeUtils = DateTimeUtils::getInstance();

$displayDateString = '03/02/2017';
$sqlDateString = $dateTimeUtils->formatDisplayDateStringToSqlDateString($displayDateString);
$logger->info('$sqlDateString - ' . $sqlDateString);

$displayDateTimeString = '03/02/2017 14:21:22';
$sqlDateTimeString = $dateTimeUtils->formatDisplayDateTimeStringToSqlDateTimeString($displayDateTimeString);
$logger->info('$sqlDateTimeString - ' . $sqlDateTimeString);
?>