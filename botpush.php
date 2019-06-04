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




const functions = require('firebase-functions');
const request = require('request-promise');

const LINE_MESSAGING_API = 'https://api.line.me/v2/bot/message';
const LINE_HEADER = {
  'Content-Type': 'application/json',
  'Authorization': `Bearer db7xk6drf1c/SnbXZK5El4omIzq2V2p3WYsYW7Iw5d5GARqf7kmG8yjDqnavITxZwaf1UEXQlSSu3o6+fK3l1wMPXWWczg3iM8ii864M0fpUXASRTuZd7XzuMmOpSauejmk/k7F9T+XviDJ+M+MFDwdB04t89/1O/w1cDnyilFU=`
};

exports.LineBot = functions.https.onRequest((req, res) => {
  if (req.body.events[0].message.type !== 'text') {
    return;
  }
  reply(req.body);
});

const reply = (bodyResponse) => {
  return request({
    method: `POST`,
    uri: `${LINE_MESSAGING_API}/reply`,
    headers: LINE_HEADER,
    body: JSON.stringify({
      replyToken: bodyResponse.events[0].replyToken,
      messages: [
        {
          type: `text`,
          text: bodyResponse.events[0].message.text
        }
	  ]
    })
  });
};


