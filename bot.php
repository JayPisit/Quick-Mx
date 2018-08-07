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
			// Build message to reply bac
			$array = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
			//$letters = strtolower($text);
			//$array = str_split($letters);
			foreach ($array as $value) {
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

				if($value=='ก' or $value=='ด' or $value=='ถ' or $value=='ท' or $value=='ภ' or $value=='า' or $value=='ำ' or $value=='่' or $value=='ุ'or $value=='ฤ'){
					$Totalval = $Totalval + 1;
				}
				if($value=='ข' or $value=='ช' or $value=='บ' or $value=='ป' or $value=='ง' or $value=='เ' or $value=='แ' or $value=='ู' or $value=='้'){
					$Totalval = $Totalval + 2;
				}
				if($value=='ฆ' or $value=='ฑ' or $value=='ฒ' or $value=='ต' or $value=='๋'){
					$Totalval = $Totalval + 3;
				}
				if($value=='ค' or $value=='ธ' or $value=='ญ' or $value=='ร' or $value=='ษ' or $value=='ะ' or $value=='โ' or $value=='ั'or $value=='ิ'){
					$Totalval = $Totalval + 4;
				}
				if($value=='ฉ' or $value=='ฌ' or $value=='ณ' or $value=='น' or $value=='ม' or $value=='ห' or $value=='ฎ' or $value=='ฮ' or $value=='ฬ'or $value=='ึ'){
					$Totalval = $Totalval + 5;
				}
				if($value=='จ' or $value=='ล' or $value=='ว' or $value=='อ' or $value=='ใ'){
					$Totalval = $Totalval + 6;
				}
				if($value=='ซ' or $value=='ศ' or $value=='ส' or $value=='ี' or $value=='ื' or $value=='๊' ){
					$Totalval = $Totalval + 7;
				}
				if($value=='ผ' or $value=='ฝ' or $value=='พ' or $value=='ฟ' or $value=='ย' or $value=='็'){
					$Totalval = $Totalval + 8;
				}
				if($value=='ฏ' or $value=='ฐ' or $value=='ไ' or $value=='์' ){
					$Totalval = $Totalval + 9;
				}

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
