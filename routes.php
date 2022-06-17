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
Route::add('/list/join', function() {
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/list/join.php';
});
Route::add('/list/get', function() {
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/list/get.php';
});
Route::add('/list/share', function() {
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/list/share.php';
});
Route::add('/item/new', function() {
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/item/new.php';
});
Route::add('/item/check', function() {
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/item/check.php';
});
Route::add('/item/uncheck', function() {
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/item/uncheck.php';
});
Route::add('/item/edit', function() {
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/item/edit.php';
});
Route::add('/item/getEdit', function() {
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/item/getEdit.php';
});
Route::add('/item/delete', function() {
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/item/delete.php';
});
Route::add('/cron', function() {
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/cron.php';
});
Route::pathNotFound(function() {
	$response->status = 'error';
  	$response->message = 'No API path defined.';
  	echo json_encode($response);
  	exit;
});

Route::run('/');
?>
