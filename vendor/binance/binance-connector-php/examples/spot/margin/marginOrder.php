<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

$key = '';
$secret = '';

$client = new \Binance\Spot([
    'key'  => $key,
    'secret'  => $secret
]);

$response = $client->marginOrder(
    'BNBUSDT',
    [
        'orderId' => 213205622,
        'recvWindow' => 5000
    ]
);

echo json_encode($response);
