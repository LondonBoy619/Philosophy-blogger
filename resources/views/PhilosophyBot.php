<?php
	$path = "https://api.telegram.org/bot1885928991:AAGY3b0GHpvk2byFrbS9ppKf3RYLkJ-TzEY";
    $update = json_decode(file_get_contents('php://input'), TRUE);
    $chat_id = "-504935294";
    $token = "1885928991:AAGY3b0GHpvk2byFrbS9ppKf3RYLkJ-TzEY";

$data = [
    'text' => 'your message here',
    'chat_id' => '-504935294'
];

file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
?>