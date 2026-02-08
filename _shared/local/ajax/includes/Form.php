<?php
namespace AjaxRequest;

use \Ms\Tools;
use \Ms\Site;
use \Ms\Sender;


class Form extends \CAjaxRequest
{
    public function sendCall() {
        $formType = $this->arParams['form-type'];
        $message = 'Имя: <b>' . htmlspecialchars($this->arParams['name']) . '</b><br>';
        $message .= 'Телефон: <b>' . htmlspecialchars($this->arParams['phone']) . '</b><br>';
        if($this->arParams['message']) {
            $message .= 'Сообщение: <b>' . htmlspecialchars($this->arParams['message']) . '</b>';
        }

        $subject = 'Заказ обратного звонка';
        $title = 'Письмо с сайта';

        $obSender = new Sender($subject, $message, $formType);
        $obSender->setLetterTitle($title);

        if($obSender->send()) {
            $this->arResult = ['status' => 'success', 'message' => 'Ваше сообщение отправлено'];
        } else {
            $this->arResult = ['status' => 'error', 'message' => 'Ошибка отправки сообщения. Повторите попытку позже'];
        }
    }

    public function sendOrder() {
        $formType = $this->arParams['form-type'];
        $message = 'Имя: <b>' . $this->arParams['name'] . '</b><br>';
        $message .= 'Телефон: <b>' . $this->arParams['phone'] . '</b><br>';
        $message .= 'Email: <b>' . $this->arParams['email'] . '</b><br>';
        $message .= 'Адрес: <b>' . $this->arParams['address'] . '</b><br>';
        $message .= 'Подъезд: <b>' . $this->arParams['entrance'] . '</b><br>';
        $message .= 'Сообщение: <b>' . $this->arParams['message'] . '</b>';

        $subject = 'Сообщение с формы Обратной связи';
        $title = 'Письмо с сайта';

        $obSender = new Sender($subject, $message, $formType);
        $obSender->setLetterTitle($title);

        if($obSender->send()) {
            $this->arResult = ['status' => 'success', 'message' => 'Ваше сообщение отправлено'];
        } else {
            $this->arResult = ['status' => 'error', 'message' => 'Ошибка отправки сообщения. Повторите попытку позже'];
        }
    }

    public function sendDirector() {
        $formType = $this->arParams['form-type'];
        $message = 'Имя: <b>' . $this->arParams['name'] . '</b><br>';
        $message .= 'Телефон: <b>' . $this->arParams['phone'] . '</b><br>';
        $message .= 'Email: <b>' . $this->arParams['email'] . '</b><br>';
        $message .= 'Адрес: <b>' . $this->arParams['address'] . '</b><br>';
        $message .= 'Сообщение: <b>' . $this->arParams['message'] . '</b>';

        $subject = 'Письмо руководителю';
        $title = 'Письмо с сайта';

        $obSender = new Sender($subject, $message, $formType);
        $obSender->setLetterTitle($title);

        if($obSender->send()) {
            $this->arResult = ['status' => 'success', 'message' => 'Ваше сообщение отправлено'];
        } else {
            $this->arResult = ['status' => 'error', 'message' => 'Ошибка отправки сообщения. Повторите попытку позже'];
        }
    }

    public function sendRequest() {
        $formType = $this->arParams['form-type'];
        if(!$this->arParams['address'] && !$this->arParams['personal-account']) {
            $this->arResult = ['status' => 'error', 'message' => 'Введите адрес или лицевой счет'];
            return;
        }
        $message = 'Адрес: <b>' . $this->arParams['address'] . '</b><br>';
        $message .= 'Лицевой счет: <b>' . $this->arParams['personal-account'] . '</b><br>';
        $message .= 'Email: <b>' . $this->arParams['email'] . '</b><br>';

        $subject = 'Запрос выписки по счету';
        $title = 'Письмо с сайта';

        $obSender = new Sender($subject, $message, $formType);
        $obSender->setLetterTitle($title);

        if($obSender->send()) {
            $this->arResult = ['status' => 'success', 'message' => 'Ваше сообщение отправлено'];
        } else {
            $this->arResult = ['status' => 'error', 'message' => 'Ошибка отправки сообщения. Повторите попытку позже'];
        }
    }
}