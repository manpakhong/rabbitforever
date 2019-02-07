<?php
	class DialogBox
	{
		public function __construct()
		{
			
		}
		public function genAlertBox($_message, $_confirmUrl)
		{
			echo
			'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">' . 	
			'<head>' .
			'<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>'.				
			'<script type="text/javascript" src="../../views/javascripts/jquery-2.1.4.js"></script>'.
			'<script type="text/javascript" src="../../views/javascripts/jqueryUI/jquery-ui.js"></script>'.
			'<link href="../../views/javascripts/jqueryUI/jquery-ui.css" rel="stylesheet" type="text/css" />'.
			'</head>' .
			'<body>' .	
			'<script>
				alert("' . $_message . '");window.location="'. $_confirmUrl . '";
			</script>' .
			'</body>'.
			'</html>'
			;			 
		}
		public function genDialogBox($_message, $_title, $_confirmUrl)
		{
			echo
			'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">' . 	
			'<head>' .
			'<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>'.				
			'<script type="text/javascript" src="../../views/javascripts/jquery-2.1.4.js"></script>'.
			'<script type="text/javascript" src="../../views/javascripts/jqueryUI/jquery-ui.js"></script>'.
			'<link href="../../views/javascripts/jqueryUI/jquery-ui.css" rel="stylesheet" type="text/css" />'.
			'</head>' .
			'<body>' .	
			'<div id="dialog" title="'.$_title.'">
				<p>'. $_message .'</p>
				<a href="'. $_confirmUrl .'" class="customDialog"><input type="button" value="Confirm"></a>
			</div>'.
			'<script>
				$(function() {
					$( "#dialog" ).dialog();
				});
			</script>' .
			'</body>'.
			'</html>'
			
			
			;

		}

	}

?>