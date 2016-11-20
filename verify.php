<?php
$access_token = 's89PzaxXfgvGxeDZQHRl2cD0jDlGcfbgRx6xNAMQwa4gJpQpkzH4J3NZDTh0cpONnlvWFmGHsx+MujbaUWXdMseItZ9z0LMZc7zgncPvPSOiWtXt45zBY+3/ExJnQA/smhUfgeBzOwbXKOSfNwQNbgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>
