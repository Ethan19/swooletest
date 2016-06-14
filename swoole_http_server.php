<?php
$http = new swoole_http_server('0.0.0.0',9502);
$http->on("request",function($request ,$response){
	//var_dump($request);die;
	$pathinfo = $request->server['path_info'];
	//echo $pathinfo;
	$filename = __DIR__.$pathinfo;
	if(is_file($filename)){
		$ext = pathinfo($request->server['PATH_INFO'],PATHINFO_EXTENSION);
		if($ext == 'php'){
			ob_start();
			include($filename);
			$content = ob_get_contents();
			ob_end_clean();
			$response->end($content);
		}else{
			$mimes  = include('mimes.php');
			$response->header('Content-Type',$mimes[$ext]);
			$content = file_get_contents($filename);
			$response->end($content);
		}
	}else{

		$response->status('404');
		$response->end("404 not found");
	}
	
});
$http->start();
?>