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
	$list_id = $GLOBALS[database]->get('token','list_id',[
		'token'=>$token,
	]);
	$items = $GLOBALS[database]->select('item','*',[
		'list_id'=>$list_id,
		'ORDER'=>[
			'created_time'=>'DESC',
		],
	]);
	foreach($items as $key=>$item){
		$item['name'] = str_replace('>','&gt;',str_replace('<','&lt;',$item['name']));
		$item['description'] = str_replace('>','&gt;',str_replace('<','&lt;',$item['description']));
		$items[$key] = $item;
	}

	$response->status = 'success';
	$response->items = $items;
	echo json_encode($response);
	exit;
}
?>
