<?php
class WebUtils{
	public static function redirect($url){
		$javascriptCode = '<script type="text/javascript"> window.location.href="' . $url . '";</script>';
		echo $javascriptCode;
	}
}
?>