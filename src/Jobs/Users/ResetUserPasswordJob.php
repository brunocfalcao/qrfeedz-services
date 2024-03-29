<?php

namespace QRFeedz\Services\Jobs\Users;

use Illuminate\Support\Facades\Mail;
use QRFeedz\Cube\Models\User;
use QRFeedz\Foundation\Abstracts\QRFeedzJob;
use QRFeedz\Services\Mail\Users\ResetUserPasswordMail;

class ResetUserPasswordJob extends QRFeedzJob
{
    public $userId;

    public $invalidate;

    public function __construct(int $userId, bool $invalidatePassword = false)
    {
        $this->userId = $userId;
        $this->invalidate = $invalidatePassword;
    }

    public function handle()
    {
        $user = User::find($this->userId);
        $resetLink = $user->getPasswordResetLink($this->invalidate);
        $email = $user->email;

        Mail::to($user)
            ->send(new ResetUserPasswordMail(
                $user,
                [
                    'invalidate' => $this->invalidate,
                    'resetLink' => $resetLink."?email={$email}",
                ]
            ));
    }
}
