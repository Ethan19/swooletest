<?php
$server = new swoole_websocket_server("0.0.0.0", 9501);

$server->on('open', function (swoole_websocket_server $server, $request) {
});

$server->on('message', function (swoole_websocket_server $server, $frame) {
	if($fd){
		$fd = ($fd>=$frame->fd)?$fd:$frame->fd
	}else{
		$fd = $frame->fd;
	}
    $data = $frame->data;
    //$fd = $frame->fd;
    $res = 'data  is '.$data  . '  pid = ' . $fd."\n";
    echo $res;
    $server->push($fd,$res);

});
//$server->send();
$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();