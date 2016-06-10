<?php
$client = new swoole_client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);

$client->on('connect',function(swoole_client $cli){
	$cli->send("nihao");
});

$client->on("receive",function(swoole_client $cli,$data){
	echo "Receive:".$data."\n";
});

$client->on('error',function(swoole_client $cli){
	echo "error\n";
});

$client->on("close",function(swoole_client $cli){
	echo "Connection close fails\n";
});

$client->connect("127.0.0.1",9501);











// //连接到服务器

// if (!$client->connect('127.0.0.1', 9501, 0.5))
// {
//     die("connect failed.");
// }
// //向服务器发送数据
// if (!$client->send("hello world"))
// {
//     die("send failed.");
// }
// //从服务器接收数据
// $data = $client->recv();
// if (!$data)
// {
//     die("recv failed.");
// }
// echo "accept msg:".$data;

// //关闭连接
// $client->close();