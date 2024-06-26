<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.index', [
            'wallets' => auth()->user()->wallets()->orderBy('title', 'ASC')->get(),
        ]);
    }
}
