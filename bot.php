<?php
$access_token = 'rGdH8wrWcCEuOO7JrEjNWwjBZq8ZgLy1mBajYJgjFoKta4u6ncr0ysA/mHswNMYZh1Vb0peZSQHZ80AGHtsurjpQh2R2LD5eTcleSJpJQxzjWecysbUQi1LwCRfOtW3CPGKOzM7GHhj+WV5vJ2c95gdB04t89/1O/w1cDnyilFU=';

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
			// Get replyToken
			$replyToken = $event['replyToken'];

			$Totalval = 0;
			// Build message to reply back
			$letters = strtolower($text);
			$array[] = str_split($letters);
			foreach ($array[] as $value) {
				if($value=='a' or $value=='j' or $value=='s'){
					$Totalval = $Totalval + 1;
				}
				if($value=='b' or $value=='k' or $value=='t'){
					$Totalval = $Totalval + 2;
				}
				if($value=='c' or $value=='l' or $value=='u'){
					$Totalval = $Totalval + 3;
				}
				if($value=='d' or $value=='m' or $value=='v'){
					$Totalval = $Totalval + 4;
				}
				if($value=='e' or $value=='n' or $value=='w'){
					$Totalval = $Totalval + 5;
				}
				if($value=='f' or $value=='o' or $value=='x'){
					$Totalval = $Totalval + 6;
				}
				if($value=='g' or $value=='p' or $value=='y'){
					$Totalval = $Totalval + 7;
				}
				if($value=='h' or $value=='q' or $value=='z'){
					$Totalval = $Totalval + 8;
				}
				if($value=='i' or $value=='r'){
					$Totalval = $Totalval + 9;
				}
				$Totalval = $Totalval + 1;
			}


















			//if($text=='Shiba where to eat'){

				$messages = [
				'type' => 'text',
				'text' => (string)$Totalval

			];







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
}
echo "OK";
