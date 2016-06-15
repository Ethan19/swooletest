<?php
/******************
mysql部分
******************/
// $db = new mysqli;
// $db->connect('127.0.0.1', 'swoole', 'swoole', 'swoole');//用户名、密码、库名均为swoole

/********************
服务
********************/
$server = new swoole_websocket_server("0.0.0.0", 9502);

$server->on('open', function (swoole_websocket_server $server, $request) {//建立链接
    //var_dump($server);
});

$server->on('message', function (swoole_websocket_server $server, $frame) {//接受消息
    $

    if($fd){
        $fd = ($fd>=$frame->fd)?$fd:$frame->fd;
    }else{
        $fd = $frame->fd;
    }
    $data = json_decode($frame->data);

    for ($i=1; $i <=$fd ; $i++) { 
        $res = 'data is'.$data  . 'fd=' . $fd."\n";
        echo $res;
        $server->push($i,$res);
    }


});

//$server->send();
$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();