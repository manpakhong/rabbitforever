<?php
include_once('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once(MODELS_PATH . '/ModelHelper.php');

$string = "createDate";
$modelHelper = new ModelHelper();
$converted = $modelHelper->convertObjToDbFieldName($string);
print "$converted";

?>