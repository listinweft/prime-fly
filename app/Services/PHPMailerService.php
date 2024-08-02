<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Log;

class PHPMailerService
{
    protected $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);
        
        // SMTP settings
        $this->mailer->isSMTP();
        $this->mailer->Host       = env('MAIL_HOST');
        $this->mailer->SMTPAuth   = true;
        $this->mailer->Username   = env('MAIL_USERNAME');
        $this->mailer->Password   = env('MAIL_PASSWORD');
        $this->mailer->SMTPSecure = env('MAIL_ENCRYPTION'); // tls or ssl
        $this->mailer->Port       = env('MAIL_PORT');
        
        // Sender's email
        $this->mailer->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
    }

    public function sendMail($to, $subject, $body, $from = null)
    {
        try {
            // Recipient
            $this->mailer->addAddress($to);

            // Set email format to HTML
            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body    = $body;

            if ($from) {
                $this->mailer->setFrom($from);
            }

            // Send email
            $this->mailer->send();

            return ['status' => 'success'];
        } catch (Exception $e) {
            Log::error('PHPMailer Error: ' . $this->mailer->ErrorInfo);
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}
