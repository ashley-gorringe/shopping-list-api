<?php
$token = $_GET['token'];

if(empty($token)){
	$response->status = 'error';
	$response->message = 'Token has not been declared.';
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

if(empty($_GET['item_n'])){
	$response->status = 'error';
	$response->message = 'Item name has not been declared.';
	echo json_encode($response);
	exit;
}

$list_id = $GLOBALS[database]->get('token','list_id',[
	'token'=>$token,
]);

$item_count = $GLOBALS[database]->count('item',[
	'list_id'=>$list_id
]);

if($item_count >= 100){
	$response->status = 'error';
	$response->message = 'Item limit reached.';
	echo json_encode($response);
	exit;
}

$GLOBALS[database]->insert('item',[
	'list_id'=>$list_id,
	'name'=>$_GET['item_n'],
	'description'=>$_GET['description'],
]);
$item_id = $GLOBALS[database]->id();

$item = $GLOBALS[database]->get('item','*',[
	'id'=>$item_id
]);

$response->status = 'success';
$response->item = $item;
echo json_encode($response);
exit;
?>
