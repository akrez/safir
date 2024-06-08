<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Models\User;
use App\Models\Wallet;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return view('wallet.index', [
            'user' => $user,
            'wallets' => auth()->user()->wallets()->orderBy('updated_at', 'DESC')->paginate(50),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        return view('wallet.create', [
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWalletRequest $request, User $user)
    {
        auth()->user()->wallets()->create($request->validated());

        return redirect()->route('wallets.index', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, Wallet $wallet)
    {
        return view('wallet.edit', [
            'user' => $user,
            'wallet' => $wallet,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWalletRequest $request, User $user, Wallet $wallet)
    {
        $wallet->update($request->validated());

        return redirect()->route('wallets.index', ['user' => $user]);
    }
}
