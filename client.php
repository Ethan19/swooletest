<?php
$client = new swoole_client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC); //异步非阻塞

$client->on("connect", function($cli) {
    echo "connected\n";
    $cli->send("select * from user");
});

$client->on("receive", function($cli, $data) {
    if(empty($data)){
        $cli->close();
        echo "closed\n";
    } else {
        echo "received: $data\n";
        sleep(1);
        $cli->send("select * from user");
    }
});

$client->on("error", function($cli){
    exit("error\n");
});

$client->on("close", function($cli){
    echo "connection is closed\n";
});		

$client->connect('127.0.0.1', 9502, 0.5);











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