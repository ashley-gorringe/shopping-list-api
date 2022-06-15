<?php
header('Content-Type: application/json');
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Access-Control-Allow-Origin: *");

use Steampixel\Route;

Route::add('/list/new', function() {
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/list/new.php';
});
Route::pathNotFound(function() {
	$response->status = 'error';
  	$response->message = 'No API path defined.';
  	echo json_encode($response);
  	exit;
});

Route::run('/');
?>
