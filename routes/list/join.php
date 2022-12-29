<?php
$token = randomStringCaps(60);
$share_code = $_GET['code'];

$share_code_count = $GLOBALS['database']->count('share',[
	'code'=>$share_code,
]);
if($share_code_count != 1){
	$response->status = 'error';
	$response->message = 'Code is not valid.';
	echo json_encode($response);
	exit;
}

$list_id = $GLOBALS['database']->get('share','list_id',[
	'code'=>$share_code,
]);

try{
	$GLOBALS['database']->insert('token',[
		'token'=>$token,
		'list_id'=>$list_id
	]);

	$GLOBALS['logsnag']->publish([
		'channel'=>'actions',
		'event'=>'List Joined',
		'description'=>'A user has joined an existing list.',
		'icon'=>'🤝',
		'notify'=>true,
	]);

	$response->status = 'success';
	$response->token = $token;
	echo json_encode($response);
	exit;
}catch(Exception $e){
	$response->status = 'error';
	$response->message = $e;
	echo json_encode($response);
	exit;
}
?>
