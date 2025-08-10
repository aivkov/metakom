<?php

$to      = 'a343147@yandex.ru';
$subject = 'Тема письмо';
$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><title>Рассылка CMD</title><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"></head><body>';
$message .= '<p>Проверка связи</p>';
$message .= '</body></html>';
$headers = 'From: Конпания Метаком Сервис<no-reply@metakom-murom.ru>' . "\r\n" .
    'MIME-Version: 1.0' . "\r\n" .
    'Content-type: text/html; charset=utf-8' . "\r\n";

if(mail($to, $subject, $message, $headers, '-f no-reply@metakom-murom.ru')) {
    echo 'success';
} else {
    echo 'error';
}