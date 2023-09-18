<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function show()
    {
        return view('admin.Auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['username', 'password', 'status']);
        $user = Admin::where('username', $credentials['username'])->first();
        if (!$user) {
            return back()->withErrors(["username" => 'username không tồn tại']);
        }
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors(['password' => 'mật khẩu không đúng'])->onlyInput('password');
        }
        if ($user->status != 1) {
            return back()->with(["statusError" => 'Admin không được kích hoạt']);
        }
        Auth::guard('admin')->login($user, true);
        $request->session()->regenerate();
        // dd('d');
        return redirect()->intended('/admin');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin');
    }
}
