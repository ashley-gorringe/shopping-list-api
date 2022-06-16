<?php
$threshold = date('Y-m-d H:i:s', strtotime("-1 day"));
try{
	$count = $GLOBALS[database]->count('item',[
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
	$response->status = 'success';
	$response->count = $count;
	$response->threshold = $threshold;
	echo json_encode($response);
	exit;
}catch(Exception $e){
	$response->status = 'error';
	$response->message = $e;
	echo json_encode($response);
	exit;
}
?>
