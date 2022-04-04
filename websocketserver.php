<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Http\Controllers\WebSocketController;

require dirname(__FILE__) . '/vendor/autoload.php';

$loop   = React\EventLoop\Factory::create();
$webSock = new React\Socket\SecureServer(
	new React\Socket\Server('https://pet.elegantsoftwares.in:8080', $loop),
	$loop,
	array(
        'local_cert'        => 'pet_elegantsoftwares_in.crt', // path to your cert
        'local_pk'          => 'pet.key', // path to your server private key
        'allow_self_signed' => false, // Allow self signed certs (should be false in production)
        'verify_peer' => FALSE
	)
);

// Ratchet magic
$webServer = new Ratchet\Server\IoServer(
	new Ratchet\Http\HttpServer(
		new Ratchet\WebSocket\WsServer(
            new WebSocketController()
		)
	),
	$webSock
);

echo $loop->run();