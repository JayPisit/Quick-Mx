<?php
$access_token = 'rGdH8wrWcCEuOO7JrEjNWwjBZq8ZgLy1mBajYJgjFoKta4u6ncr0ysA/mHswNMYZh1Vb0peZSQHZ80AGHtsurjpQh2R2LD5eTcleSJpJQxzjWecysbUQi1LwCRfOtW3CPGKOzM7GHhj+WV5vJ2c95gdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
