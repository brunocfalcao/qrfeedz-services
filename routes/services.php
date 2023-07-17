<?php

use QRFeedz\Cube\Models\User;
use QRFeedz\Services\Mail\Users\WelcomeToQRFeedz;
use QRFeedz\Services\Mail\Utils\TestTemplate;

/** ---------- USER AUTHENTICATION ----------*/
Route::get('/password-reset/{token}', [
    'uses' => 'ResetPasswordController@showResetForm',
    'as' => 'password.reset',
]);

/** ---------- TEST ROUTES ----------------- */
Route::get('/mailable', function () {
    $user = User::find(1);

    return new WelcomeToQRFeedz($user, ['url' => 'https://www.publico.pt']);
});

Route::get('/templates/{template}', function (string $template) {
    return new TestTemplate($template);
});
