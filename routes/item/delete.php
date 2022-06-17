<?php
$token = $_GET['token'];
$item_id = $_GET['item'];

if(empty($token)){
	$response->status = 'error';
	$response->message = 'Token has not been declared.';
	echo json_encode($response);
	exit;
}
if(empty($item_id)){
	$response->status = 'error';
	$response->message = 'Item has not been declared.';
	echo json_encode($response);
	exit;
}

$token_count = $GLOBALS[database]->count('token',[
	'token'=>$token,
]);
if($token_count != 1){
	$response->status = 'error';
	$response->message = 'Token is not valid.';
	echo json_encode($response);
	exit;
}

$item_count = $GLOBALS[database]->count('item',[
	'id'=>$item_id,
]);
if($item_count != 1){
	$response->status = 'error';
	$response->message = 'Item is not valid.';
	echo json_encode($response);
	exit;
}

$list_id = $GLOBALS[database]->get('token','list_id',[
	'token'=>$token,
]);

$item = $GLOBALS[database]->get('item','*',[
	'id'=>$item_id
]);

if($item['list_id'] != $list_id){
	$response->status = 'error';
	$response->message = 'Item is not available.';
	echo json_encode($response);
	exit;
}

try{
	$GLOBALS[database]->delete('item',[
		'id'=>$item_id,
	]);
	$response->status = 'success';
	echo json_encode($response);
	exit;
}catch(Exception $e){
	$response->status = 'error';
	$response->message = $e;
	echo json_encode($response);
	exit;
}
?>
