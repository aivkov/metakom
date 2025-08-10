<?php

namespace Ms;

class Sender
{
    private $subject;
    private $message;
    private $title;

    private $emailFrom;

    public function __construct($subject, $message)
    {
        $this->subject = $subject;
        $this->message = $message;
    }

    public function setLetterTitle($title) {
        $this->title = $title;
    }

    private function getLetterTitle() {
        return $this->title ?: 'Письмо';
    }
    public function send()
    {
        $emailsTo = Site::getEmails();
        $to = implode(',', $emailsTo);
        $headers = $this->getHeaders();
        $message = $this->getEmailHeader() . $this->message . $this->getEmailFooter();

        return mail($to, $this->subject, $message, $headers, $this->getAdditionalParams());

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
}