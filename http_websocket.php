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

// var_dump($redis);
$server = new swoole_websocket_server("0.0.0.0", 9501);

$server->on('open', function (swoole_websocket_server $server, $request) {//建立链接
    
    // $type = "login";
    // $msg = $request->fd."已登录";
    // echo $request->fd."login success\n";
    // $reply = json_encode(array("type"=>$type,"msg"=>$msg));
    // $server->push($request->fd,$reply);
    //获取用户列表
    //getListUser($server,$request->fd);
    //var_dump($userlist,$request->fd);
    
});

$server->on('message', function (swoole_websocket_server $server, $frame){//接受消息
    //var_dump($redis);
    if($fd){
        $fd = ($fd>=$frame->fd)?$fd:$frame->fd;
    }else{
        $fd = $frame->fd;
    }
    $data = json_decode($frame->data);
    //var_dump($data);
    //登陆
    if($data->type == "login"){
        // $type = "login";
        // $msg = '用户'.$fd."登录\n";
        echo "login success\n";
        // $res = array("type"=>$type,"msg"=>$msg); 
        // $jsonRes = json_encode($res);
        echo "$fd\n";
        addUser($frame->fd);//redis增加用户
        // echo "user-$fd\n";
        msg($server,"login","user-$fd");//通知上线消息
        //获取用户列表
        getListUser($server,$fd);
    }elseif($data->type == "message"){

    }


});

//$server->send();
$server->on('close', function ($ser, $fd){
    delUser($fd);//redis删除用户
    getListUser($ser,$fd);//重新获取用户列表
    msg($ser,"close","user-$fd");//通知下线消息
    echo "client {$fd} closed\n";
});
$server->start();

/**
 * [addUser 往redis增加用户]
 * @author 1023
 * @date    2016-06-16
 */
function addUser($fd){
    // global $redis;
    $redis = new swoole_redis;
        $redis->connect('127.0.0.1', 6379, function (swoole_redis $redis, $result) use($fd){
            var_dump($result);
            $redis->set("user-".$fd,"fd-".$fd, function($redis,$result){ 
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
    // global $redis;
    // var_dump($redis);
        $redis = new swoole_redis;
        $redis->connect('127.0.0.1', 6379, function (swoole_redis $redis, $result) use($fd){
            $redis->del("user-".$fd, function($redis,$result){ 
            });
        });
}
/**
 * [getListUser 获取redis用户列表]
 * @author 1023
 * @date          2016-06-16
 * @return [type] [description]
 */
function getListUser($server,$fd){
    $redis = new swoole_redis;
    $redis->connect('127.0.0.1', 6379, function (swoole_redis $redis, $result) use($server,$fd){
        $redis->keys("user-*", function(swoole_redis $client,$result) use($server,$fd){
            for($i=0;$i<count($result);$i++){
                $cliendId = str_replace("user-" , "", $result[$i]);//获取在线用户，发送消息
                $server->push($cliendId,json_encode(array("type"=>"userlist","msg"=>$result)));
            }
            
        });
    });
}

function msg($server,$type,$user){
    echo "type=$type\n";
    $redis = new swoole_redis;
    $redis->connect('127.0.0.1', 6379, function (swoole_redis $redis, $result) use($server,$type,$user){
        $redis->keys("user-*", function(swoole_redis $client,$result) use($server,$type,$user){
            for($i=0;$i<count($result);$i++){
                $cliendId = str_replace("user-" , "", $result[$i]);//获取在线用户，发送消息
                if($type == "login"){
                    $data = array("type"=>"login","msg"=>$user."已上线");
                }else if($type=="close"){
                    $data = array("type"=>"close","msg"=>$user."已下线");
                }
                $server->push($cliendId,json_encode($data));
            }
        });
    });   
}