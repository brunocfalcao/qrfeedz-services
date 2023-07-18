<?php

use QRFeedz\Cube\Models\User;
use QRFeedz\Services\Controllers\ResetPasswordController;
use QRFeedz\Services\Mail\Users\WelcomeToQRFeedz;
use QRFeedz\Services\Mail\Utils\TestTemplate;

/** ---------- USER AUTHENTICATION / PASSWORD ROUTES ----------*/

// Shows the password reset for the user.
Route::get('password/reset', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Sends the password reset link email.
Route::post('password/email', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Shows the password reset form, for the user to change the password.
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('password.reset.form');

// Changes the user password.
Route::post('password/reset', [ResetPasswordController::class, 'resetPassword'])->name('password.reset.submit');

/** ---------- TEST ROUTES ----------------- */
Route::get('/mailable', function () {
    $user = User::find(1);

    return new WelcomeToQRFeedz($user, ['url' => 'https://www.publico.pt']);
});

Route::get('/templates/{template}', function (string $template) {
    return new TestTemplate($template);
});
