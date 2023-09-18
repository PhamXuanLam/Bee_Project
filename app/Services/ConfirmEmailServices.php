<?php

namespace App\Services;

use App\Mail\EmailConfirm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConfirmEmailServices
{
    public function send(Request $request, string $email)
    {
        $request->session()->get('confirmToken', "");
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $confirmToken = substr(str_shuffle($permitted_chars), 0, 4);
        $request->session()->put('confirmToken', $confirmToken);
        Mail::to($email)->send(new EmailConfirm());
    }
}
