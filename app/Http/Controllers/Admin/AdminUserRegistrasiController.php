<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminUserRegistrasiController extends Controller
{
    public function index()
    {
        return view('admin.user.index', [
            'users' => User::latest()->get(),
        ]);
    }
}
