<?php
class EmailSender
{
    public function send($recipient, $subject, $message, $from)
    {
        $header = "From: {$from}"
            . "\nMIME-Version: 1.0\n"
            . "Content-Type: text/html; charset=\"utf-8\"\n";
        return mb_send_mail($recipient, $subject, $message, $header);
    }
}