<?php

namespace QRFeedz\Services\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use QRFeedz\Cube\Models\User;

class ResetPasswordController extends Controller
{
    public function showResetPasswordForm($token)
    {
        return view('password.reset-form', compact('token'));
    }
}
