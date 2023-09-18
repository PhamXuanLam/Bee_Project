<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribesRequest;
use App\Models\Subscribes;
use Illuminate\Http\Request;

class SubscribesController extends Controller
{
    public function store(SubscribesRequest $request)
    {
        $data = [
            'email' => $request->get('email'),
            'status' => 1
        ];
        $subscribes = new Subscribes();
        $subscribes->fill($data);
        $subscribes->save();
        return response()->json(['message' => "Đăng ký thành công!"]);
    }
}
