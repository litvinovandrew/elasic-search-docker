<?php
// create curl resource
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://elasticsearch:9200/megacorp/employee/1?pretty',
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json'
    ],
    CURLOPT_CUSTOMREQUEST => 'PUT',
    CURLOPT_POSTFIELDS => json_encode([
        'first_name' => 'John',
        'last_name' => 'Smith',
        'age' => 25,
        'about' => 'I love to go rock climbing',
        'interests' => ['sports', 'music']
    ]),
    CURLOPT_USERPWD => 'elastic:changeme'
));

$content = curl_exec($curl);
var_dump($content);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://elasticsearch:9200/megacorp/employee/_search?pretty',
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json'
    ],
    CURLOPT_USERPWD => 'elastic:changeme'
));

$content = curl_exec($curl);

var_dump($content);