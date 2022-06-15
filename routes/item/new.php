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
}else{
	if(empty($_GET['name'])){
		$response->status = 'error';
		$response->message = 'Item name has not been declared.';
		echo json_encode($response);
		exit;
	}

	$list_id = $GLOBALS[database]->get('token','list_id',[
		'token'=>$token,
	]);

	$GLOBALS[database]->insert('item',[
		'list_id'=>$list_id,
		'name'=>$_GET['name'],
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
}
?>
