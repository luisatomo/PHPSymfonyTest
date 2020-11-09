<?php

namespace AppBundle\Service;

use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Mime\Email;

class Mailer
{
    private $mailer;
    private $templating;

    public function __construct(\Swift_Mailer $mailer, TwigEngine $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    public function sendEmail($to,$subject,$body)
    {
        
        $message = (new Email())
            ->subject($subject)
            ->from('bcv@entry-test.com')
            ->to($to)
            ->html(
                $body,
                'text/plain'
            );

        try{
            $this->mailer->send($message);
        }
        catch(\Exception $e){
            $this->addFlash('error', 'The email to '.$to.' has not been sent');
        }
        return true;
    }
}