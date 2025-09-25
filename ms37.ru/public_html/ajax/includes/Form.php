<?php
namespace AjaxRequest;

class Form extends \CAjaxRequest
{
    public function sendFeedback() {
        $name = htmlspecialchars($this->arParams['name']);
        $phone = htmlspecialchars($this->arParams['phone']);
        $email = htmlspecialchars($this->arParams['email']);
        $city = htmlspecialchars($this->arParams['city']);
        $address = htmlspecialchars($this->arParams['address']);
        $entrance = htmlspecialchars($this->arParams['entrance']);
        $comment = htmlspecialchars($this->arParams['comment']);

        $message = '<p>Имя: <b>' . $name . '</b></p>';
        $message .= '<p>Телефон: <b>' . $phone . '</b></p>';
        $message .= '<p>Email: <b>' . $email . '</b></p>';
        $message .= '<p>Город: <b>' . $city . '</b></p>';
        $message .= '<p>Адрес: <b>' . $address . '</b></p>';
        $message .= '<p>Подъезд: <b>' . $entrance . '</b></p>';
        $message .= '<p>Сообщение: <b>' . $comment . '</b></p>';

        $subject = 'Заявка с сайта';

        $this->send($subject, $message);
    }

    public function sendCallUs() {
        $name = htmlspecialchars($this->arParams['name']);
        $phone = htmlspecialchars($this->arParams['phone']);
        $city = htmlspecialchars($this->arParams['city']);

        $message = '<p>Имя: <b>' . $name . '</b></p>';
        $message .= '<p>Телефон: <b>' . $phone . '</b></p>';
        $message .= '<p>Город: <b>' . $city . '</b></p>';

        $subject = 'Запрос обратного звонка';

        $this->send($subject, $message);
    }

    public function send($subject, $message) {
        $to = 'ivanovo@ms37.ru, kineshma@ms37.ru, 731voice@gmail.com';
        //$to = 'a343147@yandex.ru';
        //$headers[] = 'From: no-reply@' . $_SERVER['SERVER_NAME'];
        $headers[] = 'From: ivanovo@ms37.ru';
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';

        if(mail($to, $subject, $message, implode("\r\n", $headers),  '-fivanovo@ms37.ru')) {
            $this->arResult = ['status' => 'success', 'message' => 'Ваше сообщение отправлено. В ближайшее время менеджер свяжется с вами'];
        } else {
            $this->arResult = ['status' => 'error', 'message' => 'Ошибка отправки сообщения. Повторите попытку позже'];
        }
    }

}