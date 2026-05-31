<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();

$mail->Port = 587;
$mail->setFrom('no-reply@' . $_SERVER['SERVER_NAME'], 'Метаком Севис');
$mail->addAddress('a343147@yandex.ru');

$mail->isHTML();
$mail->Subject = 'Привет из PHPMailer!';
$mail->Body = 'Это <b>HTML-письмо</b>, отправленное с помощью PHPMailer с сайта ' . $_SERVER['SERVER_NAME'];

// Отправка письма
var_dump($mail->send());
echo $mail->ErrorInfo;

$a = $mail;