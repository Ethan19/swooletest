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

$server->on('open', function (swoole_websocket_server $server, $request) {
        /**
     * [$sql 新增用户]
     * @var string
     */
    // var_dump($server);
    $name = "name".$request->fd;
    $avator = "avator".$request->fd;
    $time = time();
    $fd = $request->fd;


    $sql = "INSERT INTO user VALUES('','{$name}','{$avator}','{$time}','{$fd}')";
    echo $sql."\n";
    addRes($sql);
});

$server->on('message', function (swoole_websocket_server $server, $frame) {

    if($fd){
        $fd = ($fd>=$frame->fd)?$fd:$frame->fd;
    }else{
        $fd = $frame->fd;
    }
    $data = $frame->data;
    /**********
    mysql
    **********/
    //global $insertId;
    $content = $data;
    $userId = "11";
    $time = time();
    $fd = $frame->fd;

    $ssql = "INSERT INTO message VALUES('','{$content}','{$userId}','{$time}','{$fd}')";
    echo $ssql."\n";
    addRes($ssql);
    //$fd = $frame->fd;
    for ($i=1; $i <=$fd ; $i++) { 
        $res = 'data  is '.$data  . '  pid = ' . $fd."\n";
        echo $res;
        $server->push($i,$res);
    }


});


//$server->send();
$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();



/*******
mysql部分
实例代码
http://wiki.swoole.com/wiki/page/119.html
$db = new mysqli;
$db->connect('127.0.0.1', 'root', 'root', 'test');
$db->query("show tables", MYSQLI_ASYNC);
swoole_event_add(swoole_get_mysqli_sock($db), function($db_sock) {
    global $db;
    $res = $db->reap_async_query();
    var_dump($res->fetch_all(MYSQLI_ASSOC));
    swoole_event_del(swoole_get_mysqli_sock($db)); // socket处理完成后，从epoll事件中移除socket 
});
*******/
function addRes($sql){
    $db = new mysqli;
    $db->connect('127.0.0.1', 'swoole', 'swoole', 'swoole');//用户名、密码、库名均为swoole
    $db->query($sql, MYSQLI_ASYNC);
    swoole_event_add(swoole_get_mysqli_sock($db), function($db_sock) {
        echo "22222\n";
        global $db;
        //var_dump($db->_insert_id);
        $res = $db->reap_async_query();//获取查询结构
        var_dump($res->fetch_all(MYSQLI_ASSOC));
        swoole_event_del(swoole_get_mysqli_sock($db)); // socket处理完成后，从epoll事件中移除socket 
    });


}




/******************
mysql部分
******************/
//PHP Warning:  swoole_mysql_query(): mysql client is waiting response, cannot send new sql query. in /home/wwwroot/default/swooletest/http_websocket.php on line 139,,addUser和addMsg一起使用会报此错，换中方式
//$db = new mysqli;
//$db->connect('127.0.0.1', 'root', 'root', 'test');

// function addUser($db,$sql){
//     echo $sql."\n";

//     //$sql = "SELECT * FROM  `userinfo` LIMIT 0, 10000";
//     $s = microtime(true);

//     swoole_mysql_query($db, $sql, function(mysqli $db, $r) {
//         global $s;
//         //SQL执行失败了
//         if ($r == false)
//         {
//             var_dump($db->_error, $db->_errno);
//         }
//         //执行成功，update/delete/insert语句，没有结果集
//         elseif ($r == true)
//         {
//             global $insertId;
//             $insertId = $db->_insert_id;
//             //var_dump($db->_affected_rows, $db->_insert_id);
//         }
//         //执行成功，$r是结果集数组
//         else
//         {
//             echo "count=".count($r).", time=".(microtime(true) - $s), "\n";
//             var_dump($r);

//             swoole_mysql_query($db, "show tables", function ($db, $r) {
//                 var_dump($r);
//             });
//         }
//         $db->close();
//     });
// }

// function addMsg($db,$sql){
//     echo $sql."\n";

//     //$sql = "SELECT * FROM  `userinfo` LIMIT 0, 10000";
//     $s = microtime(true);

//     swoole_mysql_query($db, $sql, function(mysqli $db, $r) {
//         global $s;
//         //SQL执行失败了
//         if ($r == false)
//         {
//             var_dump($db->_error, $db->_errno);
//         }
//         //执行成功，update/delete/insert语句，没有结果集
//         elseif ($r == true)
//         {
//             var_dump($db->_affected_rows, $db->_insert_id);
//         }
//         //执行成功，$r是结果集数组
//         else
//         {
//             echo "count=".count($r).", time=".(microtime(true) - $s), "\n";
//             var_dump($r);

//             swoole_mysql_query($db, "show tables", function ($db, $r) {
//                 var_dump($r);
//             });
//         }
//             $db->close();
//     });
// }