<?php
namespace AjaxRequest;

use \Ms\Tools;
use \Ms\Site;
use \Ms\Sender;


class Form extends \CAjaxRequest
{
    public function sendCall() {
        $message = '<p>Имя: <b>' . $this->arParams['name'] . '</b></p>';
        $message .= '<p>Телефон: <b>' . $this->arParams['phone'] . '</b></p>';

        $subject = 'Сообщение с формы Обратной связи';
        $title = 'Письмо с сайта';

        $obSender = new Sender($subject, $message);
        $obSender->setLetterTitle($title);

        if($obSender->send()) {
            $this->arResult = ['status' => 'success', 'message' => 'Ваше сообщение отправлено'];
        } else {
            $this->arResult = ['status' => 'error', 'message' => 'Ошибка отправки сообщения. Повторите попытку позже'];
        }
    }

    public function sendOrder() {
        $message = '<p>Имя: <b>' . $this->arParams['name'] . '</b></p>';
        $message .= '<p>Телефон: <b>' . $this->arParams['phone'] . '</b></p>';
        $message .= '<p>Email: <b>' . $this->arParams['email'] . '</b></p>';
        $message .= '<p>Адрес: <b>' . $this->arParams['address'] . '</b></p>';
        $message .= '<p>Подъезд: <b>' . $this->arParams['entrance'] . '</b></p>';
        $message .= '<p>Сообщение: <b>' . $this->arParams['message'] . '</b></p>';

        $subject = 'Сообщение с формы Обратной связи';
        $title = 'Письмо с сайта';

        $obSender = new Sender($subject, $message);
        $obSender->setLetterTitle($title);

        if($obSender->send()) {
            $this->arResult = ['status' => 'success', 'message' => 'Ваше сообщение отправлено'];
        } else {
            $this->arResult = ['status' => 'error', 'message' => 'Ошибка отправки сообщения. Повторите попытку позже'];
        }
    }
}