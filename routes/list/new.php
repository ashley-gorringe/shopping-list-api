<?php
$token = randomStringCaps(60);
try{
	$GLOBALS['database']->insert('list',[]);
	$list_id = $GLOBALS['database']->id();

	$GLOBALS['database']->insert('token',[
		'token'=>$token,
		'list_id'=>$list_id
	]);

	$GLOBALS['logsnag']->publish([
		'channel'=>'actions',
		'event'=>'New List Created',
		'description'=>'A user has created a new list.',
		'icon'=>'✨',
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
