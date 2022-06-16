<?php
$threshold = date('Y-m-d H:i:s', strtotime("-1 day"));

try{
	$item_count = $GLOBALS[database]->count('item',[
		'AND'=>[
			'checked'=>1,
			'checked_time[<=]'=>$threshold,
		]
	]);
	$GLOBALS[database]->delete('item',[
		'AND'=>[
			'checked'=>1,
			'checked_time[<=]'=>$threshold,
		]
	]);
}catch(Exception $e){
	$response->status = 'error';
	$response->message = $e;
	echo json_encode($response);
	exit;
}

try{
	$share_count = $GLOBALS[database]->count('share',[
		'created_time[<=]'=>$threshold,
	]);
	$GLOBALS[database]->delete('share',[
		'created_time[<=]'=>$threshold,
	]);
}catch(Exception $e){
	$response->status = 'error';
	$response->message = $e;
	echo json_encode($response);
	exit;
}

$response->status = 'success';
$response->threshold = $threshold;
$response->item_count = $item_count;
$response->share_count = $share_count;
echo json_encode($response);
exit;
?>
