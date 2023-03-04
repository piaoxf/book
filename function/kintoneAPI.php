<?php

// $domain = 'p3x60ippiz4l';
// $app_id = '1';
// $api_token = 'fy4972cfKg707IhdDVQffPWx3rnFCnBmc9VcgtjL';

// $url = 'https://p3x60ippiz4l.cybozu.com/k/v1/records.json';
// $headers = [
//   'X-Cybozu-API-Token: $api_token',
//   'Content-Type: application/json'
// ];

// $body = [
//   'app' => 1,
//   'records' => [
//     'text' => [
//       'value' => 'sample text'
//     ],
//     'text' => [
//       'value' => 'sample text2'
//     ]
//   ]
// ];

// // JSONに変換
// $json = json_encode($body);

// // 初期化
// $curl = curl_init($url);

// curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
// curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
// curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

// $response = curl_exec($curl);
// echo $response;

// curl_close($curl);
//１
// require __DIR__ . '/vendor/autoload.php';

// use Cybozu\Kintone\Api\Record;

// $subdomain = 'YOUR_DOMAIN';
// $apiToken = 'YOUR_API_TOKEN';

// $appId = 1; // アプリIDを指定

// $record = new Record($subdomain, $apiToken);
// $response = $record->getRecords($appId);

// var_dump($response);
// function getFieldValue($record, $fieldCode) {
//     return $record['record'][$fieldCode]['value'];
//   }
  

$domain = 'p3x60ippiz4l';
$app_id = '1';
$api_token = 'fy4972cfKg707IhdDVQffPWx3rnFCnBmc9VcgtjL';

function insert(){
    global $domain, $app_id, $api_token;
    $data = array(
        'app' => $app_id,
        'record' => array(
            'field_code1' => array('value' => 'field_value1'),
            'field_code2' => array('value' => 'field_value2'),
        ),
    );
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' => json_encode($data),
            'ignore_errors' => true,
            'timeout' => 30,
        ),
    );
    $context = stream_context_create($options);
    $url = "https://{$domain}.cybozu.com/k/v1/record.json";
    $result = file_get_contents($url, false, $context);
    return $result;
}


function select($filed){
    global $domain, $app_id, $api_token;
    $options = array(
        'http' => array(
            'method' => 'GET',
            'header' => "X-Cybozu-API-Token:". $api_token ."\r\n",
            // 'ignore_errors' => true,
            // 'timeout' => 30,
        ),
    );
    $context = stream_context_create($options);
    // サーバに接続してデータを貰う
	$contents = file_get_contents( 'https://'.$domain .'.cybozu.com/k/v1/records.json?app='. $app_id , FALSE, $context );
    // $url = "https://{$domain}.cybozu.com/k/v1/records.json?app={$app_id}";
    // $result = file_get_contents($contents, false, $context);
    $data = json_decode($contents, true);
    return $data['records'][0][$filed]['value'];
}

