<?php
$access_token = 's89PzaxXfgvGxeDZQHRl2cD0jDlGcfbgRx6xNAMQwa4gJpQpkzH4J3NZDTh0cpONnlvWFmGHsx+MujbaUWXdMseItZ9z0LMZc7zgncPvPSOiWtXt45zBY+3/ExJnQA/smhUfgeBzOwbXKOSfNwQNbgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];

			switch ($text) {
				case 'Hi':
					$msg ='สวัสดีค่ะ';
					break;
				case 'สวัสดี':
					$msg ='สวัสดีค่ะ';
					break;
				case 'โมจิ':
					$msg ='เรียนโมจิสุดสวย ทำไมคะ อิอิ';
					break;
				default:
					$msg = 'ฉันไม่เข้าใจ ??';
					break;
			}

			// Get replyToken
			$messages = [
				'type' => 'text',
				'text' => $msg
			];
			
		
			$replyToken = $event['replyToken'];
			// Build message to reply back
			

			
		}else{
			
			$messages = [
				'type' => 'text',
				'text' => 'ฉันไม่เข้าใจ ??'
			];
			$replyToken = $event['replyToken'];
		}
		// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";


	}
}
echo "OK";
?>
