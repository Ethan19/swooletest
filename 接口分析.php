<?php
/**
 * 接口分析
 */

swoole_server

swoole_server->start();

	启动server，监听所有TCP/UDP端口，函数原型：
	bool swoole_server->start()
	启动成功后会创建worker_num+2个进程。主进程+Manager进程+worker_num个Worker进程。

swoole_server::__construct
swoole_server->set
swoole_server->on
swoole_server->addListener
swoole_server->addProcess
swoole_server->listen
swoole_server->start
swoole_server->reload
swoole_server->stop
swoole_server->shutdown
swoole_server->tick
swoole_server->after
swoole_server->defer
swoole_server->clearTimer
swoole_server->close
swoole_server->send
swoole_server->sendfile
swoole_server->sendto
swoole_server->sendwait
swoole_server->sendMessage
swoole_server->exist
swoole_server->connection_info
swoole_server->connection_list
swoole_server->bind
swoole_server->stats
swoole_server->task
swoole_server->taskwait
swoole_server->finish
swoole_server->heartbeat
swoole_server->getLastError


事件回调
onStart
onShutdown
onWorkerStart
onWorkerStop
onTimer
onConnect
onReceive
onPacket
onClose
onTask
onFinish
onPipeMessage
onWorkerError
onManagerStart
onManagerStop





$server->on('open', function (swoole_websocket_server $server, $request) use($db){
	var_dump($server);
object(swoole_websocket_server)#1 (16) {
  ["global":"swoole_http_server":private]=>
  int(0)
  ["connections"]=>
  object(swoole_connection_iterator)#2 (0) {
  }
  ["host"]=>
  string(7) "0.0.0.0"
  ["port"]=>
  int(9502)
  ["mode"]=>
  int(3)
  ["type"]=>
  int(1)
  ["ports"]=>
  array(1) {
    [0]=>
    object(swoole_server_port)#3 (4) {
      ["host"]=>
      string(7) "0.0.0.0"
      ["port"]=>
      int(9502)
      ["type"]=>
      int(1)
      ["onClose"]=>
      object(Closure)#6 (1) {
        ["parameter"]=>
        array(2) {
          ["$ser"]=>
          string(10) "<required>"
          ["$fd"]=>
          string(10) "<required>"
        }
      }
    }
  }
  ["onOpen"]=>
  object(Closure)#4 (1) {
    ["parameter"]=>
    array(2) {
      ["$server"]=>
      string(10) "<required>"
      ["$request"]=>
      string(10) "<required>"
    }
  }
  ["onMessage"]=>
  object(Closure)#5 (1) {
    ["parameter"]=>
    array(2) {
      ["$server"]=>
      string(10) "<required>"
      ["$frame"]=>
      string(10) "<required>"
    }
  }
  ["onClose"]=>
  object(Closure)#6 (1) {
    ["parameter"]=>
    array(2) {
      ["$ser"]=>
      string(10) "<required>"
      ["$fd"]=>
      string(10) "<required>"
    }
  }
  ["setting"]=>
  array(10) {
    ["open_http_protocol"]=>
    bool(true)
    ["open_mqtt_protocol"]=>
    bool(false)
    ["open_eof_check"]=>
    bool(false)
    ["open_length_check"]=>
    bool(false)
    ["open_websocket_protocol"]=>
    bool(true)
    ["worker_num"]=>
    int(1)
    ["task_worker_num"]=>
    int(0)
    ["pipe_buffer_size"]=>
    int(33554432)
    ["buffer_output_size"]=>
    int(2097152)
    ["max_connection"]=>
    int(65535)
  }
  ["master_pid"]=>
  int(19770)
  ["manager_pid"]=>
  int(19771)
  ["worker_id"]=>
  int(0)
  ["taskworker"]=>
  bool(false)
  ["worker_pid"]=>
  int(19773)
}

    var_dump($request);
	object(swoole_http_request)#8 (3) {
	  ["fd"]=>
	  int(1)
	  ["header"]=>
	  array(12) {
	    ["host"]=>
	    string(20) "192.168.169.184:9501"
	    ["connection"]=>
	    string(7) "Upgrade"
	    ["pragma"]=>
	    string(8) "no-cache"
	    ["cache-control"]=>
	    string(8) "no-cache"
	    ["upgrade"]=>
	    string(9) "websocket"
	    ["origin"]=>
	    string(7) "file://"
	    ["sec-websocket-version"]=>
	    string(2) "13"
	    ["user-agent"]=>
	    string(114) "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36"
	    ["accept-encoding"]=>
	    string(19) "gzip, deflate, sdch"
	    ["accept-language"]=>
	    string(26) "zh-CN,zh;q=0.8,zh-TW;q=0.6"
	    ["sec-websocket-key"]=>
	    string(24) "djxPK46I6zy6LWuiLSUSLQ=="
	    ["sec-websocket-extensions"]=>
	    string(42) "permessage-deflate; client_max_window_bits"
	  }
	  ["server"]=>
	  array(10) {
	    ["request_method"]=>
	    string(3) "GET"
	    ["request_uri"]=>
	    string(1) "/"
	    ["path_info"]=>
	    string(1) "/"
	    ["request_time"]=>
	    int(1465963241)
	    ["request_time_float"]=>
	    float(1465963241.2988)
	    ["server_port"]=>
	    int(9501)
	    ["remote_port"]=>
	    int(55983)
	    ["remote_addr"]=>
	    string(15) "192.168.169.118"
	    ["server_protocol"]=>
	    string(8) "HTTP/1.1"
	    ["server_software"]=>
	    string(18) "swoole-http-server"
	  }
}

});
$server->on('message', function (swoole_websocket_server $server, $frame) {//接受消息
var_dump($frame);
object(swoole_websocket_frame)#8 (4) {
  ["fd"]=>
  int(1)
  ["finish"]=>
  bool(true)
  ["opcode"]=>
  int(1)
  ["data"]=>
  string(15) "{"cmd":"login"}"
}


});






$db = new mysqli;

$db->connect();

var_dump($db);
object(mysqli)#1 (19) {
  ["affected_rows"]=>
  int(0)
  ["client_info"]=>
  string(79) "mysqlnd 5.0.11-dev - 20120503 - $Id: 15d5c781cfcad91193dceae1d2cdd127674ddb3e $"
  ["client_version"]=>
  int(50011)
  ["connect_errno"]=>
  int(0)
  ["connect_error"]=>
  NULL
  ["errno"]=>
  int(0)
  ["error"]=>
  string(0) ""
  ["error_list"]=>
  array(0) {
  }
  ["field_count"]=>
  int(0)
  ["host_info"]=>
  string(20) "127.0.0.1 via TCP/IP"
  ["info"]=>
  NULL
  ["insert_id"]=>
  int(0)
  ["server_info"]=>
  string(10) "5.5.48-log"
  ["server_version"]=>
  int(50548)
  ["stat"]=>
  string(133) "Uptime: 4708  Threads: 4  Questions: 323  Slow queries: 0  Opens: 50  Flush tables: 1  Open tables: 43  Queries per second avg: 0.068"
  ["sqlstate"]=>
  string(5) "00000"
  ["protocol_version"]=>
  int(10)
  ["thread_id"]=>
  int(22)
  ["warning_count"]=>
  int(0)
}



$db = new mysqli;
$db->connect('127.0.0.1', 'swoole', 'swoole', 'swoole');//用户名、密码、库名均为swoole
$db->query($sql, MYSQLI_ASYNC);
swoole_event_add(swoole_get_mysqli_sock($db), function($db_sock) {
    //$db_sock,insert下返回
    echo "22222\n";
    global $db;
    //var_dump($db->_insert_id);
    $res = $db->reap_async_query();//获取查询结构
    //var_dump($res->fetch_all(MYSQLI_ASSOC));
    swoole_event_del(swoole_get_mysqli_sock($db)); // socket处理完成后，从epoll事件中移除socket 
});
reap_async_query 
Get result from async query. 仅可用于 mysqlnd。 获取异步的结果集

eventLoop
epoll/kqueue轮询和队列


mysql_proxy_server.php代码分析
idle_pool数组，连接池
array(2) {
  [0]=>
  array(3) {
    ["mysqli"]=>
    object(mysqli)#5 (19) {
      ["affected_rows"]=>
      int(0)
      ["client_info"]=>
      string(79) "mysqlnd 5.0.11-dev - 20120503 - $Id: 15d5c781cfcad91193dceae1d2cdd127674ddb3e $"
      ["client_version"]=>
      int(50011)
      ["connect_errno"]=>
      int(0)
      ["connect_error"]=>
      NULL
      ["errno"]=>
      int(0)
      ["error"]=>
      string(0) ""
      ["error_list"]=>
      array(0) {
      }
      ["field_count"]=>
      int(0)
      ["host_info"]=>
      string(20) "127.0.0.1 via TCP/IP"
      ["info"]=>
      NULL
      ["insert_id"]=>
      int(0)
      ["server_info"]=>
      string(10) "5.5.48-log"
      ["server_version"]=>
      int(50548)
      ["stat"]=>
      string(135) "Uptime: 15269  Threads: 8  Questions: 2988  Slow queries: 0  Opens: 52  Flush tables: 1  Open tables: 43  Queries per second avg: 0.195"
      ["sqlstate"]=>
      string(5) "00000"
      ["protocol_version"]=>
      int(10)
      ["thread_id"]=>
      int(528)
      ["warning_count"]=>
      int(0)
    }
    ["db_sock"]=>
    int(7)
    ["fd"]=>
    int(0)
  }
  [1]=>
  array(3) {
    ["mysqli"]=>
    object(mysqli)#6 (19) {
      ["affected_rows"]=>
      int(0)
      ["client_info"]=>
      string(79) "mysqlnd 5.0.11-dev - 20120503 - $Id: 15d5c781cfcad91193dceae1d2cdd127674ddb3e $"
      ["client_version"]=>
      int(50011)
      ["connect_errno"]=>
      int(0)
      ["connect_error"]=>
      NULL
      ["errno"]=>
      int(0)
      ["error"]=>
      string(0) ""
      ["error_list"]=>
      array(0) {
      }
      ["field_count"]=>
      int(0)
      ["host_info"]=>
      string(20) "127.0.0.1 via TCP/IP"
      ["info"]=>
      NULL
      ["insert_id"]=>
      int(0)
      ["server_info"]=>
      string(10) "5.5.48-log"
      ["server_version"]=>
      int(50548)
      ["stat"]=>
      string(135) "Uptime: 15269  Threads: 8  Questions: 2989  Slow queries: 0  Opens: 52  Flush tables: 1  Open tables: 43  Queries per second avg: 0.195"
      ["sqlstate"]=>
      string(5) "00000"
      ["protocol_version"]=>
      int(10)
      ["thread_id"]=>
      int(529)
      ["warning_count"]=>
      int(0)
    }
    ["db_sock"]=>
    int(8)
    ["fd"]=>
    int(0)
  }
}



小知识点
swoole_event_add();
swoole_event系列函数给了使用者操作底层事件循环的能力。这样任何网络socket的文件描述符都可以加入swoole的事件循环中，以实现异步化。

如mysql/redis等第三方存储的TCP连接，或者PHP的streams/sockets/fsockopen创建的TCP连接，都可以加入到swoole中。



process
swoole_process->pop
从队列中提取数据。

array_pop — 将数组最后一个单元弹出（出栈）

array_push

(PHP 4, PHP 5, PHP 7)
array_push — 将一个或多个单元压入数组的末尾（入栈）




workess
array(2) {
  [3816]=>
  object(swoole_process)#1 (2) {
    ["callback"]=>
    string(17) "callback_function"
    ["pid"]=>
    int(3816)
  }
  [3817]=>
  object(swoole_process)#2 (2) {
    ["callback"]=>
    string(17) "callback_function"
    ["pid"]=>
    int(3817)
  }
}







