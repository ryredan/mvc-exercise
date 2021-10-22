<?php

class ContactController extends Controller
{
    public function process($params)
    {
        $this->head = array(
            'title' => 'Contact form',
            'description' => 'Contact us using out email form'
        );

        if($_POST)
        {
            try
            {
                $emailSender = new EmailSender();
                $emailSender->sendWithAntispam($_POST['antispam'], "admin@address.com", "Email from your website", $_POST['message'], $_POST['email']);
                $this->addMessage('The email was successfully sent.');
                $this->redirect('contact');
            }
            catch (UserException $ex)
            {
                $this->addMessage($ex->getMessage());
            }
        }
        // if (isset($_POST['email']))
        // {
        //     if($_POST['abc'] == date("Y"))
        //     {
        //         $emailSender = new EmailSender();
        //         $emailSender->send("admin@address.com", "Email from your website", $_POST['message'], $_POST['email']);
        //     }
        // }
        $this->view = 'contact';
    }
}