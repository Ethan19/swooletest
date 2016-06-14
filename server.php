<?PHP
//error_reporting(0);
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

$server = new swoole_websocket_server("0.0.0.0", 9501);

$server->on('open', function (swoole_websocket_server $server, $request) {
	$server->push($request->fd,$request->data);
});

$server->on('message', function (swoole_websocket_server $server, $frame) {
	// if($fd){
	// 	$fd = ($fd>=$frame->fd)?$fd:$frame->fd;
	// }else{
	// 	$fd = $frame->fd;
	// }
	// global $fd;
  //   $data = $frame->data;
  //   for($i=1;$i<=$fd;$i++){
	 //    $res = 'data  is '.$data.'fd = '.$i."\n";
		// echo $res;
     	$server->push($frame->fd,$frame->data);
  //   }
});
//$server->send();
$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
    // for ($i=1; $i <=$fd ; $i++) { 
    // 	$ser->push($i,"server is stop");
    // }
});

$server->start();

/********************************
获取redis相关信息
********************************/
$redis = new swoole_redis();
public function getUserList(){
	$client->connect('127.0.0.1', 6379, function (swoole_redis $client, $result) {
		
	});
}


