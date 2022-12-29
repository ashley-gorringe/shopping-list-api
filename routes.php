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
	$response = (object)[];
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/list/new.php';
});
Route::add('/list/join', function() {
	$response = (object)[];
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/list/join.php';
});
Route::add('/list/get', function() {
	$response = (object)[];
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/list/get.php';
});
Route::add('/list/share', function() {
	$response = (object)[];
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/list/share.php';
});
Route::add('/list/clean', function() {
	$response = (object)[];
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/list/clean.php';
});
Route::add('/item/new', function() {
	$response = (object)[];
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/item/new.php';
});
Route::add('/item/check', function() {
	$response = (object)[];
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/item/check.php';
});
Route::add('/item/uncheck', function() {
	$response = (object)[];
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/item/uncheck.php';
});
Route::add('/item/edit', function() {
	$response = (object)[];
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/item/edit.php';
});
Route::add('/item/getEdit', function() {
	$response = (object)[];
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/item/getEdit.php';
});
Route::add('/item/delete', function() {
	$response = (object)[];
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/item/delete.php';
});
Route::add('/cron', function() {
	$response = (object)[];
	require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes/cron.php';
});
Route::pathNotFound(function() {
	$response = (object)[];
	$response->status = 'error';
  	$response->message = 'No API path defined.';
  	echo json_encode($response);
  	exit;
});

Route::run('/');
?>
