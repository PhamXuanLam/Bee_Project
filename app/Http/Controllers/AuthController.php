<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Services\ConfirmEmailServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private ConfirmEmailServices $confirmEmailServices;

    public function __construct(ConfirmEmailServices $confirmEmailServices)
    {
        $this->confirmEmailServices = $confirmEmailServices;
    }

    public function show()
    {
        return view("web.auth.login");
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['username', 'password']);
        $user = User::where('username', $credentials['username'])->first();
        if (!$user) {
            return back()->withErrors(["username" => 'username không tồn ta'])->onlyInput('username');
        }
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors(['password' => 'mật khẩu không đúng'])->onlyInput('password');
        }
        Auth::login($user, true);
        $request->session()->regenerate();
        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register()
    {
        return view('web.auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $account = new User();
        $params = $request->only(['name', 'username', 'password', 'email']);
        $account->fill($params);
        $account->password = Hash::make($request->input('password'));
        // dd($account);
        $account->save();
        return redirect('/login')->with('succses', 'Đăng ký thành công');
    }

    public function forgotPassword()
    {
        return view('web.auth.forgotPassword');
    }

    public function confirmEmail(Request $request)
    {
        $email = $request->get('email');
        $isExist = User::query()
            ->where('email', $email)
            ->exists();
        if ($isExist) {
            $this->confirmEmailServices->send($request, $email);
            return view('web.auth.confirm', ['email' => $email]);
        } else {
            return redirect('/forgotPassword')->with('error', 'Sai thông tin email');
        }
    }

    public function codeConfirm(Request $request)
    {
        $email = $request->get('email');
        $codeConfirm = $request->session()->get('confirmToken', "");
        if ($codeConfirm == $request->get('code_confirm')) {
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            $newPassword = substr(str_shuffle($permitted_chars), 0, 6);
            $user = User::query()->where('email', $email)->first();
            $user->fill([
                'password' => Hash::make($newPassword)
            ]);
            $user->save();
            return view('web.auth.newPassword', ['newPassword' => $newPassword]);
        } else {
            $message = !empty($codeConfirm) ? "Sai mã xác nhận" : "Mã xác nhận hết hiệu lực";
            return view('web.auth.confirmAgain', ['email' => $email, 'error' => $message]);
        }
    }

    public function confirmAgain(Request $request)
    {
        $email = $request->get('email');
        $this->confirmEmailServices->send($request, $email);
        return view('web.auth.confirm', ['email' => $email]);
    }
}
