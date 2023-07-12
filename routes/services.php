<?php

use QRFeedz\Cube\Models\User;
use QRFeedz\Services\Mail\Users\WelcomeToQRFeedz;

/** ---------- USER AUTHENTICATION ----------*/

Route::get('/password-reset/{token}', [
    'uses' => 'ResetPasswordController@showResetForm',
    'as' => 'password.reset',
]);

/** ---------- TEST ROUTES ----------------- */
Route::get('/mailable', function () {

    $user = User::find(1);

    return new WelcomeToQRFeedz($user);
});
