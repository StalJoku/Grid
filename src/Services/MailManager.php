<?php

namespace App\Services;

class MailManager
{
    
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {        
        $this->mailer = $mailer;
    }

    public function notifyOfNewProduct($productId, $productType)
    {        

        $message = (new \Swift_Message('Site update just happened!'))
            ->setFrom('admin@example.com')
            ->setTo('manager@example.com')
            ->addPart(
                'Someone just added a product: '.$productId.' '.$productType
            );

        return $this->mailer->send($message) > 0;
    }
}