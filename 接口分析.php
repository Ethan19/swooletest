<?php
/**
 * 接口分析
 */
$server->on('open', function (swoole_websocket_server $server, $request) use($db){
	var_dump($server);


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