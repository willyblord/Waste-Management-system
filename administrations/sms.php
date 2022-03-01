<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.mista.io/sms",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => 'phone number','from' => 'WASTEMGT','sms' => 'Hi: Mumugi wamusanze turabashishikariza kugira isuku, nokumenyekanisha ahari umwanda mumuhanda mukoresheje aplication ya WASTEMGT','unicode' => '1'),
  CURLOPT_HTTPHEADER => array(
    "x-api-key: {{70f9523c-53d1-9eaf-b304-94d74d92cb5c-fe53d017}}"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;