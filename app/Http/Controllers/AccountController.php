<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\User;
use App\Http\Requests\AccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = [
            'user' => $user
        ];
        return view('web.account.index',$data );
    }

    public function store(AccountRequest $request)
    {
        $user = User::query()->find($request->get('id'));
        $params = $request->only(['phone_number', 'email', 'address']);
        $file = $request->file('avatar');
        if ($file) {
            $fileName = $file->getClientOriginalName();
            $file->move(public_path(User::DIRECTORY_AVATAR), $fileName);
            $params['avatar'] = User::DIRECTORY_AVATAR . '/' . $fileName;
        }
        $user->fill($params);
        $user->save();
        return redirect('/account')->with('success', 'Cập nhật thông tin thành công !');
    }

    public function changePassword()
    {
        return view('web.account.changePassword');
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        $currentPassword = $request->get('current_password');
        if (!Hash::check($currentPassword, $user->getAuthPassword())) {
            return redirect('/account/changePassword')->with('current_password', 'Mật khẩu hiện tại không đúng !');
        }
        $newPassword = $request->get('password');
        $user->fill([
            'password' => Hash::make($newPassword)
        ]);
        $user->save();
           return redirect('/account/changePassword')->with('success', 'Đổi mật khẩu thành công !');
    }

    public function orders()
    {
        $userId = Auth::user()->getAuthIdentifier();
        /**
         * Cách 1
         */
//        $query = Orders::query();
//        $query = $query->with([
//            'orderItems' => function($sQuery) {
//                return $sQuery->with(['product']);
//            }
//        ]);
        /**
         * viết tắt
         */
        $orders = Orders::query()
            ->with(['orderItems.product'])
            ->where('user_id', $userId)
            ->get();
        return view('web.account.orders', ['orders' => $orders]);
    }

    public function orderItems(int $id)
    {
        $orderItems = OrderItems::query()
            ->with(['product', 'order'])
            ->where('order_id', $id)
            ->get();
        return view('web.account.orderItems', ['orderItems' => $orderItems]);
        }
}
