<?php
$formPage = basename($_SERVER['PHP_SELF'] ?? 'index.php');
$consultationFormEnabled = $consultationFormEnabled ?? false;

if (!$consultationFormEnabled) {
    return;
}
?>
<section class="section section--consultation section--consultation-request" id="consultation">
    <div class="container">
        <div class="consultation">
            <div class="consultation__header">
                <h2 class="consultation__title">Связаться</h2>
                <p class="consultation__subtitle">Оставьте заявку, и мы свяжемся с вами в ближайшее время.</p>
            </div>

            <?php if ($successMessage): ?>
                <div class="alert alert--success" role="status"><?= htmlspecialchars($successMessage, ENT_QUOTES, 'UTF-8'); ?></div>
            <?php endif; ?>

            <?php if ($errorMessage): ?>
                <div class="alert alert--error" role="alert"><?= htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8'); ?></div>
            <?php endif; ?>

            <form class="consultation__form" action="forms/send.php" method="post" novalidate data-consultation-form>
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="form_started_at" value="<?= time(); ?>">
                <input type="hidden" name="form_page" value="<?= htmlspecialchars($formPage, ENT_QUOTES, 'UTF-8'); ?>">
                <div class="form-field form-field--honeypot" aria-hidden="true">
                    <label for="website">Оставьте это поле пустым</label>
                    <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                </div>

                <div class="form-field">
                    <label class="visually-hidden" for="name">Ваше имя</label>
                    <input class="input" type="text" id="name" name="name" placeholder="Ваше имя" required>
                </div>

                <div class="form-field">
                    <label class="visually-hidden" for="phone">Номер телефона</label>
                    <input class="input" type="tel" id="phone" name="phone" placeholder="Номер телефона" required data-phone-input>
                </div>

                <div class="form-field">
                    <label class="visually-hidden" for="message">Комментарий</label>
                    <textarea class="input input--textarea" id="message" name="message" placeholder="Комментарий / тема обращения"></textarea>
                </div>

                <label class="checkbox">
                    <input class="checkbox__input" type="checkbox" name="agreement" value="1" required>
                    <span class="checkbox__box"></span>
                    <span class="checkbox__text">Я даю согласие на обработку персональных данных и подтверждаю ознакомление с <a href="politika-konfidentsialnosti.php" target="_blank" rel="noopener noreferrer">Политикой в отношении обработки персональных данных</a> и <a href="soglasie-na-obrabotku-personalnykh-dannykh.php" target="_blank" rel="noopener noreferrer">Согласием на обработку персональных данных</a>.</span>
                </label>

                <div class="form-field form-field--submit">
                    <button class="button button--dark button--wide" type="submit">ОТПРАВИТЬ ЗАЯВКУ</button>
                </div>
            </form>
        </div>
    </div>
</section>
