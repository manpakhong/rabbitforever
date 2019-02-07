<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once( LOG4PHP_PATH . '/RabbitLogger.php');
include_once( UTILS_PATH . '/DateTimeUtils.php');
$dateTimeUtils = DateTimeUtils::getInstance();
$folder = MOVIES_IMAGES_UPLOADS_PATH;
$timeStampString = $dateTimeUtils->getNowString();
foreach($_FILES as $file) {
	$n = $file['name'];
	$ext = pathinfo($n, PATHINFO_EXTENSION);
	$filename = pathinfo($n ,PATHINFO_FILENAME );
	$t = $file['tmp_name'];
	$s = $file['size'];
	if (is_array($n)) {
		$c = count($n);
		for ($i=0; $i < $c; $i++) {
			echo "<br>uploaded: " . $n[$i] . " (" . $s[$i] . " bytes)";
		}
	}
	else {
		$newFileName = $filename . $timeStampString . '.' . $ext;
		move_uploaded_file($t, "$folder/" . $newFileName);
		echo "<br>uploaded: $newFileName ($s bytes)";
	}
}

?>