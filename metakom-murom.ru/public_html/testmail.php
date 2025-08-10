<?php

$to      = 'a343147@yandex.ru';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: no-reply@metakom-murom.ru' . "\r\n" .
    'Content-type: text/html; charset=utf-8' . "\r\n";

if(mail($to, $subject, $message, $headers, '-f no-reply@metakom-murom.ru')) {
    echo 'success';
} else {
    echo 'error';
}