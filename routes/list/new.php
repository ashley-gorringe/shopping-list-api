<?php
$list_id = randomStringCaps(30);
try{
	$GLOBALS[database]->insert('list',[
		'list_id'=>$list_id,
	]);
	$response->status = 'success';
	$response->list_id = $list_id;
	echo json_encode($response);
	exit;
}catch(Exception $e){
	$response->status = 'error';
	$response->message = $e;
	echo json_encode($response);
	exit;
}
?>
