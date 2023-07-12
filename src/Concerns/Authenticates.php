<?php

namespace QRFeedz\Services\Concerns;

trait Authenticates
{
    /**
     * Resets an user password. Follows several options.
     *
     * @param  boolean $invalidate Immediately invalidate the password
     * @param  boolean $notify     Send the user a reset password notification
     *
     * @return string              The password reset link.
     */
    public function resetPassword($invalidate = false, $notify = false)
    {
    }
}
