<?PHP
// $serv = new swoole_server("127.0.0.1", 9501);
// $serv->on('connect', function ($serv, $fd){
//     echo "Client:Connect.\n";
// });
// $serv->on('receive', function ($serv, $fd, $from_id, $data) {
//     $serv->send($fd, 'Swoole: '.$data);
//     //$serv->sendfile($fd, 'nihao');
//     //$serv->close($fd);
// });
// $serv->on('close', function ($serv, $fd) {
//     echo "Client: Close.\n";
// });
// $serv->start();;
$server = new swoole_websocket_server("0.0.0.0", 9502);

$server->on('open', function (swoole_websocket_server $server, $request) {
	// var_dump($request)."\n";
	// //$fd = $request->fd;
	//global $fd;
    file_put_contents( __DIR__ .'/log.txt' , $request->fd);
});

$server->on('message', function (swoole_websocket_server $server, $frame) {
    global $client;
    $data = $frame->data;

    $m = file_get_contents( __DIR__ .'/log.txt');
    for ($i=1 ; $i<= $m ; $i++) {
        echo PHP_EOL . 'server2 data  is '.$data  . '  pid = ' . $frame->fd."\n";
        $server->push($i, $data );
    }

});

$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();