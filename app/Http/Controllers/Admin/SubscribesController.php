<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribes;

class SubscribesController extends Controller
{
    public function index()
    {
        $items = Subscribes::query()->paginate(5);
        return view('admin.subscribes.index', ['items' => $items]);
    }
}
