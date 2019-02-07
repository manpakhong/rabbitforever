<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once(UTILS_PATH . '/CommonUtils.php');

$commonUtils = new CommonUtils();
$dateTime = new DateTime('2000-01-01');
echo $dateTime->format('Y-m-d  h:i:s.u') . '<br/>';
$dateTimeString = $commonUtils->convertDateTimeToDbString($dateTime);
print 'result:' . $dateTimeString . '<br/>';

?>