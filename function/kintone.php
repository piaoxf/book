<?php

// kintoneのAPIトークン
$api_token = 'fy4972cfKg707IhdDVQffPWx3rnFCnBmc9VcgtjL';

// 操作対象のアプリケーションID
$app_id = '1';

// kintoneのAPIエンドポイント
$api_endpoint = "https://p3x60ippiz4l.cybozu.com/k/v1/record.json";

// 新規レコードを作成する
function create_record($record_data) {
    global $api_token, $api_endpoint, $app_id;
    
    $data = array(
        'app' => $app_id,
        'record' => $record_data
    );
    
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/json\r\n" .
                        "X-Cybozu-API-Token: $api_token\r\n",
            'content' => json_encode($data)
        )
    );
    
    $context = stream_context_create($options);
    $result = file_get_contents($api_endpoint, false, $context);
    return json_decode($result, true);
}

// レコードを取得する
function get_record($record_id) {
    global $api_token, $api_endpoint, $app_id;
    
    $params = array(
        'app' => $app_id,
        'id' => $record_id
    );
    
    $url = $api_endpoint . '?' . http_build_query($params);
    
    $options = array(
        'http' => array(
            'method' => 'GET',
            'header' => "X-Cybozu-API-Token: $api_token\r\n"
        )
    );
    
    $context = stream_context_create($options);
}