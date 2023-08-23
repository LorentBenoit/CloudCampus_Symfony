<?php

namespace App\Service;

class EmailService
{
    public function send($recipientEmail, $message)
    {
        return (bool) random_int(0, 1);
    }
}

?>