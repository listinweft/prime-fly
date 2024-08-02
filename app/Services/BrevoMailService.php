<?php

namespace App\Services;

use GuzzleHttp\Client;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use SendinBlue\Client\Model\SendSmtpEmail;
use Illuminate\Support\Facades\Log;

class BrevoMailService
{
    protected $apiInstance;

    public function __construct()
    {
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', env('BREVO_API_KEY'));
        $this->apiInstance = new TransactionalEmailsApi(new Client(), $config);
    }

    public function sendEmail($to, $toName, $subject, $htmlContent)
{
    $sendSmtpEmail = new SendSmtpEmail();
    $sendSmtpEmail->setSubject($subject);
    $sendSmtpEmail->setHtmlContent($htmlContent);
    $sendSmtpEmail->setSender(['name' => config('app.name'), 'email' => env('MAIL_FROM_ADDRESS')]);
    $sendSmtpEmail->setTo([['email' => $to, 'name' => $toName]]);

    try {
        $response = $this->apiInstance->sendTransacEmail($sendSmtpEmail);
        Log::info("Email sent to {$toName} ({$to})", ['response' => $response]);
    } catch (\Exception $e) {
        Log::error('Exception when sending email: ' . $e->getMessage(), ['exception' => $e]);
    }
}

}
