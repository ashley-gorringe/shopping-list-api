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

$existing_count = $GLOBALS[database]->count('share',[
	'list_id'=>$list_id,
]);

if($existing_count < 1){
	$share_code = randomStringCode(6);
	$share_code_count = $GLOBALS[database]->count('share',[
		'code'=>$share_code,
	]);
	while($share_code_count > 0){
		$share_code = randomStringCode(6);
	}

	$GLOBALS[database]->insert('share',[
		'code'=>$share_code,
		'list_id'=>$list_id,
	]);

	$response->status = 'success';
	$response->code = $share_code;
	echo json_encode($response);
	exit;
}else{
	$share_code = $GLOBALS[database]->get('share','code',[
		'list_id'=>$list_id,
	]);
	$response->status = 'success';
	$response->code = $share_code;
	echo json_encode($response);
	exit;
}
?>
