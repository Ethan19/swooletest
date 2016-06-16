<?php
/******************
mysql部分
******************/
// $db = new mysqli;
// $db->connect('127.0.0.1', 'swoole', 'swoole', 'swoole');//用户名、密码、库名均为swoole

/********************
服务
********************/
$redis = new swoole_redis;

$server = new swoole_websocket_server("0.0.0.0", 9501);

$server->on('open', function (swoole_websocket_server $server, $request) {//建立链接
    
    // $type = "login";
    // $msg = $request->fd."已登录";
    // $reply = json_decode(array("type"=>$type,"msg"=>$msg));
    // $server->push($request->fd,$reply);
});

$server->on('message', function (swoole_websocket_server $server, $frame){//接受消息
    if($fd){
        $fd = ($fd>=$frame->fd)?$fd:$frame->fd;
    }else{
        $fd = $frame->fd;
    }
    $data = json_decode($frame->data);

    if($data->type == "login"){
        $replyTtype = "login";
        $msg = '用户'.$fd."登录\n";
        $res = array("replyTtype"=>$replyTtype,"msg"=>$msg); 
        $jsonRes = json_encode($res);
        addUser($frame->fd);
    }elseif($data->type == "message"){

    }

    //var_dump($data->type);
    for ($i=1; $i <=$fd ; $i++) {
        $server->push($i,$jsonRes);
    }
});

//$server->send();
$server->on('close', function ($ser, $fd){
    delUser($fd);
    echo "client {$fd} closed\n";
});
$server->start();

/**
 * [addUser 往redis增加用户]
 * @author 1023
 * @date    2016-06-16
 */
function addUser($fd){
    global $redis;
        $redis->connect('127.0.0.1', 6379, function (swoole_redis $redis, $result) use($fd){
            $redis->set("user-".$fd,"fd-".$fd, function($redis,$result){ 
                var_dump($result);
            });
        });
}
/**
 * [delUser 删除redis某个用户]
 * @author 1023
 * @date          2016-06-16
 * @return [type] [description]
 */
function delUser($fd){
    global $redis;
        $redis->connect('127.0.0.1', 6379, function (swoole_redis $redis, $result) use($fd){
            $redis->del("user-".$fd, function($redis,$result){ 
                var_dump($result);
            });
        });
}
/**
 * [getListUser 获取redis用户列表]
 * @author 1023
 * @date          2016-06-16
 * @return [type] [description]
 */
function getListUser(){

}