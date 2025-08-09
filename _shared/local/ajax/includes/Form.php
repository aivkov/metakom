<?php
namespace AjaxRequest;

use \Ms\Tools;
use \Ms\Site;

class Form extends \CAjaxRequest
{
    public function sendCall() {
        $message = '<p>Имя: <b>' . $this->arParams['name'] . '</b></p>';
        $message .= '<p>Телефон: <b>' . $this->arParams['phone'] . '</b></p>';
        $emailsTo = Site::getEmails();
        $sendFields = [
            'MESSAGE' => $message,
            'SUBJECT' => 'Сообщение с формы Обратной связи',
            'EMAIL_TO' => implode(',', $emailsTo),
            'DOMAIN' => Site::getDomain()
        ];

        $res = \CEvent::Send('METAKOM_SIMPLE', Site::getLid(), $sendFields);
        if($res) {
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

        $emailsTo = Site::getEmails();
        $sendFields = [
            'MESSAGE' => $message,
            'SUBJECT' => 'Сообщение с формы Обратной связи',
            'EMAIL_TO' => implode(',', $emailsTo),
            'DOMAIN' => Site::getDomain()
        ];

        $res = \CEvent::Send('METAKOM_SIMPLE', Site::getLid(), $sendFields);
        if($res) {
            $this->arResult = ['status' => 'success', 'message' => 'Ваше сообщение отправлено'];
        } else {
            $this->arResult = ['status' => 'error', 'message' => 'Ошибка отправки сообщения. Повторите попытку позже'];
        }
    }
}