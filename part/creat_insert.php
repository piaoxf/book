<?php
    require_once __DIR__ . '/../part/source.php';
    require_once __DIR__ . '/../part/navi.php';
    require_once __DIR__ . '/../part/header.php';

    $domain = 'p3x60ippiz4l';
    $app_id = '3';
    $api_token = '8OopTls7UTuEOEd7dM4iehrK6GOPbO0ThDykOchO';

    $url = 'https://p3x60ippiz4l.cybozu.com/k/v1/record.json';
    $data = [
        'app' => $app_id,
        'record' => [
            // 'record' => array('value' => ""),
            // "",
            '書籍名' => array('value' => $_POST['BookName']),
            '作者' => array('value' => $_POST['author']),
            '感想' => array('value' => $_POST['coment']),
            'タイプ' => array('value' => $_POST['bookType']),
            'upload' => array('value' => $_POST['link']),
            // 'file' => array('value' => $_POST['file']),
        ],
    ];
    // $headers = ['X-Cybozu-API-Token: "'. $api_token .'"',
    //         'Content-Type: application/json'];
    $headers = ['X-Cybozu-API-Token: 8OopTls7UTuEOEd7dM4iehrK6GOPbO0ThDykOchO',
            'Content-Type: application/json'];
    // $options = array(
    //     'http' => array(
    //         // "protocol_version" => "1.1",
    //         'method' => 'POST',
    //         // 'header' => 'Content-Type: application/json',
    //         'header' => "X-Cybozu-API-Token: ". $api_token ."\r\n" . 'Content-Type: application/json',
    //         'content' => json_encode($data),
    //         // 'ignore_errors' => true,
    //         // 'timeout' => 30,
    //     ),
    // );

    // JSONに変換
$json = json_encode($data);

// 初期化
$curl = curl_init($url);

curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

$response = curl_exec($curl);
echo $response;
curl_close($curl);
    // var_dump($options);
    // // exit;
    // $context = stream_context_create($options);
    // $contents = file_get_contents( 'https://'.$domain .'.cybozu.com/k/v1/records.json?app='. $app_id , FALSE, $context );
    // // $data = json_decode($contents, true);
    // $datas = json_decode($contents, true);
    // var_dump($data);
    // // var_dump($datas);
    // // exit;