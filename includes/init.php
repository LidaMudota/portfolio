<?php
session_start();

require_once __DIR__ . '/env.php';
require_once __DIR__ . '/url.php';
require_once __DIR__ . '/seo.php';
require_once __DIR__ . '/clinic-location.php';

enforce_canonical_host_if_needed();

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$status = $_GET['status'] ?? null;
$successMessage = null;
$errorMessage = null;

switch ($status) {
    case 'success':
        $successMessage = 'Заявка успешно отправлена. Мы свяжемся с вами в ближайшее время.';
        break;
    case 'invalid':
        $errorMessage = 'Проверьте корректность заполнения обязательных полей.';
        break;
    case 'csrf':
        $errorMessage = 'Сессия формы истекла. Обновите страницу и отправьте форму повторно.';
        break;
    case 'spam':
        $errorMessage = 'Форма отклонена системой защиты от спама.';
        break;
    case 'rate':
        $errorMessage = 'Слишком частая отправка формы. Подождите немного и попробуйте снова.';
        break;
    case 'config':
        $errorMessage = 'Email для получения заявок еще не настроен. Укажите его в config/mail.php.';
        break;
    case 'error':
        $errorMessage = 'Не удалось отправить заявку. Попробуйте позже.';
        break;
}
