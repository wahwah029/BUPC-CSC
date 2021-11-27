<?php

 $view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
 $title="Student"; 
 $header=$view; 
switch ($view) {
	case 'list' :
		$content    = 'fReport.php';		
		break;

	default :
		$content    = 'fReport.php';		
}
require_once ("../templates/template.php");

?>