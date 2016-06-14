<?php
/******************
mysql部分
******************/
$db = new mysqli;
$db->connect('127.0.0.1', 'root', 'root', 'swoole');

/********************
服务
********************/
$server = new swoole_websocket_server("0.0.0.0", 9501);

$server->on('open', function (swoole_websocket_server $server, $request) {
    //var_dump($request);
});

$server->on('message', function (swoole_websocket_server $server, $frame) use($db){

	if($fd){
		$fd = ($fd>=$frame->fd)?$fd:$frame->fd;
	}else{
		$fd = $frame->fd;
	}
    $data = $frame->data;
    $time = time();
    /**********
    mysql
    **********/
    $sql = "INSERT INTO test VALUES('','{$fd}','{$data}','{$time}','{$fd}')";

    mysqlSql($db,$sql);

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





/******************
mysql部分
******************/
//$db = new mysqli;
//$db->connect('127.0.0.1', 'root', 'root', 'test');

function mysqlSql($db,$sql){
    echo $sql."\n";

    //$sql = "SELECT * FROM  `userinfo` LIMIT 0, 10000";
    $s = microtime(true);

    swoole_mysql_query($db, $sql, function(mysqli $db, $r) {
        global $s;
        //SQL执行失败了
        if ($r == false)
        {
            var_dump($db->_error, $db->_errno);
        }
        //执行成功，update/delete/insert语句，没有结果集
        elseif ($r == true)
        {
            var_dump($db->_affected_rows, $db->_insert_id);
        }
        //执行成功，$r是结果集数组
        else
        {
            echo "count=".count($r).", time=".(microtime(true) - $s), "\n";
            var_dump($r);

            swoole_mysql_query($db, "show tables", function ($db, $r) {
                var_dump($r);
            });
        }
    });
}