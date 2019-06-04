<?php



require "vendor/autoload.php";

$access_token = 'db7xk6drf1c/SnbXZK5El4omIzq2V2p3WYsYW7Iw5d5GARqf7kmG8yjDqnavITxZwaf1UEXQlSSu3o6+fK3l1wMPXWWczg3iM8ii864M0fpUXASRTuZd7XzuMmOpSauejmk/k7F9T+XviDJ+M+MFDwdB04t89/1O/w1cDnyilFU=';

$channelSecret = '6342109af7f5467cf90cd3b1342ca8cd';

$pushID = 'Ue10bfb3ada296573f9a6b9158fbe6306';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world  สวัสดีจ้า');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







