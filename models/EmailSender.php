<?php
class EmailSender
{
    public function send($recipient, $subject, $message, $from)
    {
        $header = "From: {$from}"
            . "\nMIME-Version: 1.0\n"
            . "Content-Type: text/html; charset=\"utf-8\"\n";
        if(!mb_send_mail($recipient, $subject, $message, $header))
        {
            throw new UserException('Unable to send the email');
        }
    }

    public function sendWithAntispam($year, $recipient, $subject, $message, $from)
    {
        if($year != date("Y"))
        {
            throw new UserException('Antispam mismatch.');
        }
        $this->send($recipient, $subject, $message, $from);
    }
}