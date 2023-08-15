<?php
/* kinetone CRUD処理関数 */

/**
 * kintoneのレコードを更新（１レコード用）
 * 
 * @param string $KINTONE_SUB_DOMAIN ドメイン名
 * @param string $KINTONE_TOKEN アクセス権-token
 * @param array $body 更新するデータを配列で指定 
 * 
 * @return boolean $rtn 「true」:成功 「false」:失敗
 */
function kintone_update($KINTONE_SUB_DOMAIN, $KINTONE_TOKEN, $body){
  
  $url = 'https://'.$KINTONE_SUB_DOMAIN.'.cybozu.com/k/v1/record.json';
  $headers = [
    'X-Cybozu-API-Token: '.$KINTONE_TOKEN,
    'Content-Type: application/json'
  ];

  // JSONに変換
  $json = json_encode($body);

  // 初期化
  $curl = curl_init($url);
  
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
  
  // echo "<div style='display:none;'>";
  $rtn = curl_exec($curl);
  // echo "</div>";
  curl_close($curl);

  return $rtn;
}
/**
 * kintoneからレコードを削除（１レコード用）
 * 
 * @param string $KINTONE_SUB_DOMAIN ドメイン名
 * @param string $KINTONE_TOKEN アクセス権-token
 * @param array $body 登録するデータを配列で指定 
 * 
 * @return boolean $rtn 「true」:成功 「false」:失敗
 */
function kintone_insert($KINTONE_SUB_DOMAIN, $KINTONE_TOKEN, $body){
  
  $url = 'https://'.$KINTONE_SUB_DOMAIN.'.cybozu.com/k/v1/record.json';
  $headers = [
    'X-Cybozu-API-Token: '.$KINTONE_TOKEN,
    'Content-Type: application/json'
  ];
  
  // JSONに変換
  $json = json_encode($body);

  // 初期化
  $curl = curl_init($url);

  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

  $rtn = curl_exec($curl);
  
  curl_close($curl);
  
  return $rtn;
}
/**
 * kintoneからレコードを削除（複数レコード用）
 * 
 * @param string $KINTONE_SUB_DOMAIN ドメイン名
 * @param string $KINTONE_TOKEN アクセス権-token
 * @param array $body 登録するデータを配列で指定 
 * 
 * @return boolean $rtn 「true」:成功 「false」:失敗
 */
function kintone_insert_multi($KINTONE_SUB_DOMAIN, $KINTONE_TOKEN, $body){
  
  $url = 'https://'.$KINTONE_SUB_DOMAIN.'.cybozu.com/k/v1/records.json';
  $headers = [
    'X-Cybozu-API-Token: '.$KINTONE_TOKEN,
    'Content-Type: application/json'
  ];
  
  // JSONに変換
  $json = json_encode($body);

  // 初期化
  $curl = curl_init($url);

  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

  $rtn = curl_exec($curl);
  
  curl_close($curl);
  
  return $rtn;
}

/**
 * kintoneからレコードを削除
 * 
 * @param string $KINTONE_SUB_DOMAIN ドメイン名
 * @param string $KINTONE_TOKEN アクセス権-token
 * @param array $body 削除するレコード配列で指定（複数レコード指定可）
 * 
 * @return boolean $rtn 「true」:成功 「false」:失敗
 */
function kintone_delete($KINTONE_SUB_DOMAIN, $KINTONE_TOKEN, $body){
  
  $url = 'https://'.$KINTONE_SUB_DOMAIN.'.cybozu.com/k/v1/records.json';
  $headers = [
    'X-Cybozu-API-Token: '.$KINTONE_TOKEN,
    'Content-Type: application/json'
  ];

  // JSONに変換
  $json = json_encode($body);
  
  // 初期化
  $curl = curl_init($url);

  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

  $response = curl_exec($curl);
  $rtn=$response;
  curl_close($curl);
  
  return $rtn;
}

/**
 * kintoneからレコードを取得
 * 
 * @param string $KINTONE_SUB_DOMAIN ドメイン名
 * @param string $KINTONE_TOKEN アクセス権-token
 * @param string $KINTONE_APPNO アプリ番号
 * @param string $Where select条件
 * 
 * @return array $data kintoneのレコード
 */
function kintone_select($KINTONE_SUB_DOMAIN, $KINTONE_TOKEN, $KINTONE_APPNO, $Where=''){
  
  //kintoneアクセス
  $options = array(
      'http'=>array(
          'method'=>'GET',
          'header'=> "X-Cybozu-API-Token:". $KINTONE_TOKEN ."\r\n"
      )
  );
  $context = stream_context_create($options);
  
  //検索条件を指定してレコード取得
  $sURL='https://'. $KINTONE_SUB_DOMAIN .'.cybozu.com/k/v1/records.json?&app='. $KINTONE_APPNO.'&query='.urlencode($Where);
  
  $contents = file_get_contents($sURL , FALSE, $context);
  
  //JSON形式からArrayに変換
  $data = json_decode($contents, true);
  
  return $data;
}
