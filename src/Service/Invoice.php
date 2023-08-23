<?php

namespace App\Service;

class Invoice
{
    public $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function process($recipientEmail, $amount)
    {
        $message = "Votre commande d'un montant de {$amount}€ est confirmée";

        $result = $this->emailService->send($recipientEmail, $message);

        return $result;
    }
}

?>