<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.index', [
            'users' => User::withCount('wallets')->orderBy('id', 'DESC')->paginate(50),
        ]);
    }
}
