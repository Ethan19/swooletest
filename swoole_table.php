<?php


$server = new swoole_websocket_server("0.0.0.0", 9501);

$server->on('open', function (swoole_websocket_server $server, $request) {
    var_dump($request);
});

$server->on('message', function (swoole_websocket_server $server, $frame) {
	if($fd){
		$fd = ($fd>=$frame->fd)?$fd:$frame->fd;
	}else{
		$fd = $frame->fd;
	}
    $data = $frame->data;
    //$fd = $frame->fd;
    for ($i=1; $i <=$fd ; $i++) { 
        $res = 'data  is '.$data  . '  pid = ' . $i."\n";
        echo $res;
        $server->push($i,$res);
    }


});
//$server->send();
$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();

function tableIint(){
	$table  = new swoole_table(8192);
	
}
