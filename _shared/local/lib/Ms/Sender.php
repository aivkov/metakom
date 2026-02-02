<?php

namespace Ms;

use Bitrix\Main\Type\DateTime;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Sender
{
    private $subject;
    private $message;
    private $title;

    private $emailFrom;

    private $emailTo;

    private $formType;

    public function __construct($subject, $message, $formType = '')
    {
        $this->subject = $subject;
        $this->message = $message;
        $this->formType = $formType;
    }

    public function setLetterTitle($title) {
        $this->title = $title;
    }

    private function getLetterTitle() {
        return $this->title ?: 'Письмо';
    }

    public function send()
    {
        $this->emailTo = Site::getEmailTo($this->formType);

        //$headers = $this->getHeaders();
        $message = $this->getEmailHeader() . $this->message . $this->getEmailFooter();

        $mail = new PHPMailer();
        $mail->setFrom(Site::getEmailFrom($this->formType), Site::getEmailSiteName());
        foreach($this->emailTo as $email) {
            $mail->addAddress($email);
        }

        //$mail->addAddress('ivkov_alexey@mail.ru');
        $mail->isHTML();
        $mail->CharSet = 'UTF-8';

        $mail->Subject = $this->subject;
        $mail->Body = $message;

        $domain = Site::getDomain();
        $dkimFile = realpath($_SERVER['DOCUMENT_ROOT'] . '/../..') . '/' . $domain . '.private';

        if(file_exists($dkimFile)) {
            $mail->DKIM_private = $dkimFile;
            $mail->DKIM_domain = $domain;
            $mail->DKIM_selector = 'mail';
        }

        $result = $mail->send();
        //$result = mail($this->emailTo, $this->subject, $message, $headers, $this->getAdditionalParams());

        $this->save($result);
        return $result;
    }

    private function getHeaders() {
        return 'From: '. Site::getEmailFrom() . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8';
    }

    private function getEmailHeader()
    {
        return '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">' .
            '<html><head><title>' . $this->getLetterTitle() . '</title>'.
            '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">'.
            '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">'.
            '</head><body>';
    }

    private function getEmailFooter()
    {
        return '</body></html>';
    }

    private function getAdditionalParams() {
        return '-f ' . Site::getEmailFrom();
    }

    private function save($result)
    {
        $arFields = [
            'UF_SITE_ID' => Site::getLid(),
            'UF_DOMAIN' => Site::getDomain(),
            'UF_SUBJECT' => $this->subject,
            'UF_MESSAGE' => $this->prepareMessage($this->message),
            'UF_EMAIL_TO' => implode($this->emailTo),
            'UF_DATE_TIME' => new DateTime(),
            'UF_SUCCESS_EXEC' => $result
        ];
        $entityDataClass = HLBlock::GetEntityDataClass(FEEDBACK_HL_ID);
        $res = $entityDataClass::add($arFields);
        if($res->isSuccess()) {
            return true;
        } else {
            return false;
        }
    }

    private function prepareMessage($message) {
        $message = str_replace('<br>', "    |    ", $message);
        $message = strip_tags($message);

        $message = preg_replace('/(\+7)\s\((\d{3})\)\s(\d{3})\s\-\s(\d{2})\s\-\s(\d{2})/', '$1$2$3$4$5', $message);
        return $message;
    }

}