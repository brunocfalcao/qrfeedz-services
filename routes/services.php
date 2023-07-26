<?php

use QRFeedz\Cube\Models\User;
use QRFeedz\Services\Mail\Users\ResetUserPasswordMail;
use QRFeedz\Services\Mail\Utils\TestTemplate;

/** ---------- TEST ROUTES ----------------- */
Route::get('/mailable', function () {
    $user = User::find(1);
    $resetLink = $user->getPasswordResetLink(true);

    return new ResetUserPasswordMail($user, [
        'invalidate' => true,
        'resetLink' => $resetLink,
    ]);
});

Route::get('/templates/{template}', function (string $template) {
    return new TestTemplate($template);
});

Route::redirect(
    '/contact-us',
    'mailto:contact@qrfeedz.ch'
)
     ->name('qrfeedz.contact-us');
