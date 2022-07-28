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
$list_id = $GLOBALS[database]->get('token','list_id',[
	'token'=>$token,
]);

try{
	$GLOBALS[database]->delete('item',[
		'AND'=>[
			'checked'=>1,
			'list_id'=>$list_id.
		]
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
