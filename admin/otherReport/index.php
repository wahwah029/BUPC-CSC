<?php

 $view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
 $title="Student"; 
 $header=$view; 
switch ($view) {
	case 'list' :
		$content    = 'oReport.php';		
		break;

	default :
		$content    = 'oReport.php';		
}
require_once ("../templates/template.php");

?>