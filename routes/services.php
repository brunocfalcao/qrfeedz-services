<?php

use QRFeedz\Cube\Models\User;
use QRFeedz\Services\Mail\Users\WelcomeToQRFeedz;

Route::get('/mailable', function () {

    $user = User::find(1);

    return new WelcomeToQRFeedz($user);
});
