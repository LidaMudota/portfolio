<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    private array $config;
    private string $lastError = '';

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function getLastError(): string
    {
        return $this->lastError;
    }

    public function send(string $subject, string $body): bool
    {
        if (!class_exists(PHPMailer::class)) {
            $this->lastError = 'PHPMailer не найден. Проверьте подключение vendor/autoload.php.';
            return false;
        }

        $smtp = $this->config['smtp'] ?? [];
        $fromAddress = trim((string) ($this->config['from']['address'] ?? ''));
        $fromName = trim((string) ($this->config['from']['name'] ?? ''));
        $toAddress = trim((string) ($this->config['to']['address'] ?? ''));

        $host = trim((string) ($smtp['host'] ?? ''));
        $port = (int) ($smtp['port'] ?? 465);
        $secure = strtolower(trim((string) ($smtp['secure'] ?? 'ssl')));
        $smtpAuth = (bool) ($smtp['auth'] ?? true);
        $username = trim((string) ($smtp['username'] ?? ''));
        $password = (string) ($smtp['password'] ?? '');

        if ($host === '' || $username === '' || $password === '' || $fromAddress === '' || $toAddress === '') {
            $this->lastError = 'Не заполнены обязательные SMTP-параметры в config/mail.local.php.';
            return false;
        }

        if ($port !== 465 || !in_array($secure, ['ssl', 'smtps'], true)) {
            $this->lastError = 'Для Яндекс Почты используйте host=smtp.yandex.com, порт 465 и secure=ssl.';
            return false;
        }

        if (!$smtpAuth) {
            $this->lastError = 'Для Яндекс SMTP требуется auth=true.';
            return false;
        }

        if (!filter_var($fromAddress, FILTER_VALIDATE_EMAIL) || !filter_var($toAddress, FILTER_VALIDATE_EMAIL)) {
            $this->lastError = 'Проверьте корректность email-адресов отправителя и получателя.';
            return false;
        }

        $smtpSecure = $secure === 'ssl' || $secure === 'smtps'
            ? PHPMailer::ENCRYPTION_SMTPS
            : '';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = $host;
            $mail->Port = $port;
            $mail->SMTPAuth = $smtpAuth;
            $mail->Username = $username;
            $mail->Password = $password;
            $mail->SMTPSecure = $smtpSecure;
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = PHPMailer::ENCODING_BASE64;

            $mail->setFrom($fromAddress, $fromName !== '' ? $fromName : 'Форма сайта');
            $mail->addAddress($toAddress);

            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body = $body;

            if (!$mail->send()) {
                $this->lastError = 'SMTP ошибка: ' . ($mail->ErrorInfo !== '' ? $mail->ErrorInfo : 'неизвестная ошибка PHPMailer');
                return false;
            }

            return true;
        } catch (Exception $exception) {
            $errorInfo = $mail->ErrorInfo !== '' ? ' | PHPMailer: ' . $mail->ErrorInfo : '';
            $this->lastError = 'SMTP ошибка: ' . $exception->getMessage() . $errorInfo;
            return false;
        }
    }
}
