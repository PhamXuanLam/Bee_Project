<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = User::query();
        $params = $request->only(['keyword', 'sex', 'time']);

        $query = !empty($params['keyword']) ?
            $query->where(function ($q) use ($params) {
                return $q
                    ->where('username', 'LIKE', "%{$params['keyword']}%")
                    ->orWhere('email', 'LIKE', "%{$params['keyword']}%" );
            }) : $query;

        $query = !empty($params['sex']) && in_array($params['sex'], [User::SEX_MALE, User::SEX_FEMALE]) ?
            $query->where('sex', $params['sex']) : $query;

        $query = !empty($params['time']) ? $query->where('created_at', '>=', $params['time']) : $query;

        $users = $query->paginate(5);
        $data = [
            'users' => $users
        ];
        return view('admin.user.index', $data);
    }

    public function show($id)
    {
        $user = User::find($id);
        $data = [
            'user' => $user
        ];
        return view('admin.user.show', $data);
    }
}
