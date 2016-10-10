<?php
require __DIR__ . '/../vendor/autoload.php';

use Ratchet\Server\IoServer;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
    public function onOpen(ConnectionInterface $conn) {
    	for($i = 0 ; $i <= 10 ; $i++) {
    		$time = mktime(date("H"), date("i"), (date("s") + $i), date("n"), date("j"), date("Y"));

    		echo date('d/m/Y H:i:s', $time).' - ';

    		sleep(10);
    	}    	
    }

    public function onMessage(ConnectionInterface $from, $msg) {
    }

    public function onClose(ConnectionInterface $conn) {
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
    }
}

$server = IoServer::factory(
    new Chat(),
    8080
);

$server->run();