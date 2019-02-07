<?php
include_once ('D:/xampp/htdocs/rabbitforever/systems/Configs.php');
include_once (DAOS_PATH . '/MovieDao.php');
include_once (EOS_PATH . '/MovieEo.php');
include_once (SOS_PATH . '/MovieSo.php');

$movieDao = new MovieDao();

$movieSo = new MovieSo();
// $movieSo->setMovieNameEn('%test%');
$movieSo->setMovieNameTc('%地%');

$movieEoArray = $movieDao->selectLike($movieSo);
print_r($movieEoArray);

?>