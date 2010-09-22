<?php
$script_name = parse_url($_SERVER["HTTP_REFERER"]);
$http_host = $script_name['host'];
if($http_host == $_SERVER["SERVER_NAME"]){
	$header = get_headers($_POST['url'],1);

	//If you can use PHP 5.3.0 or higher and json_encode, just use this.
	//
	//foreach($header as &$val){
	//	&$val = htmlspecialchars(&$val);
	//}
	//header('Content-Type: application/json');
	//echo json_encode($header);
	
	//Instead of this.
	foreach($header as $key=>$val){
		//$header[$key] = htmlspecialchars($val);
		$header[$key] = $val;
	}
	$cl = $header["Content-Length"];
	if(!$cl){
		$cl = 0;
	}
	header('Content-Type: application/json');
	echo '{'
		.'"0":"' .$header[0]
		.'","Content-Type":"' .$header["Content-Type"]
		.'","Content-Length":' .$cl
	.'}';
}
?>