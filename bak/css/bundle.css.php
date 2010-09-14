<?php
ob_start('ob_gzhandler');
header('Content-Type: text/css');
$files = split(",",$_GET['files']);
foreach($files as $key=>$val){
	if(file_exists($val.'.css')){
		include_once($val.'.css');
	}else{
		echo "\n\n/*** File \"$val\" does not exist. ***/\n\n";
	}
}
?>
