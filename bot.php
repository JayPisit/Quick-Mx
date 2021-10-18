<?php
$access_token = 'zQnJoZQT15wo/V4KAH0O1Jq7DnLo6vgxJY0IHAQ6O0iUs5tZpy/0iJ3nv66Jd2Uu5jO/G57zvUyttKDP3v+Jsgq8lDO1OJ9L1/1Viu35CC0SXxzfRC3CA3mKnw/EwjEORxtoIsYsxFhSWKG2HLlULAdB04t89/1O/w1cDnyilFU=';

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

			
			
			//$array = str_split($letters);
			

			$text = strtoupper($text);
			$keywords = preg_split("/[\s,]+/", $text);
$base = (int)$keywords[0];
$cost = 0;
$wood = 0;
if(in_array("แผ่น",$keywords))
{
$cost = 0.3;
}
if(in_array("สลีท",$keywords))
{
$cost = 0.5;
}
if(in_array("ขาไม้",$keywords))
{
$wood = 0.3;
}
			
			

$total=$base+$cost+$wood;

$text='ราคาขาย = '.$total.
' \r\n[Breakdown cost] \r\nเบส: '.$base.
' \r\nค่าตัด: '.$cost.
' \r\nค่าขาไม้: '.$wood;
			
if($base == 0){$text='Format ผิด';}
			
			//$text = str_replace("ERROR_CACHE_MISSING[MS:465233]NE4","",$text);
			//$text = str_replace("P","   จํานวน ",$text);
//$text = str_replace("&"," \r\n ",$text);
			//$text = nl2br(str_replace("A"," \r\n ",$text));
		
		
		
		
		


















			

				$messages = [
				'type' => 'text',
				'text' => (string)$text

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
