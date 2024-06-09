<?php

namespace App\Http\Controllers;

use App\Enums\Transaction\TypeEnum;
use App\Http\Requests\StoreTransactionRequest;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function deposit(User $user, Wallet $wallet)
    {
        return view('transaction.deposit', [
            'wallet' => $wallet,
            'action' => route('transactions.store', [
                'user' => $user,
                'wallet' => $wallet,
            ]),
        ]);
    }

    public function withdraw(User $user, Wallet $wallet)
    {
        return view('transaction.withdraw', [
            'wallet' => $wallet,
            'action' => route('transactions.store', [
                'user' => $user,
                'wallet' => $wallet,
            ]),
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user, Wallet $wallet)
    {
        $query = $wallet->transactions();

        $stat = (clone $query)->select(
            'type',
            DB::raw('COUNT(type) as count_type'),
            DB::raw('SUM(amount) as sum_amount')
        )->groupBy('type')->get();

        return view('transaction.index', [
            'transactions' => $query->orderBy('updated_at', 'DESC')->paginate(50),
            'totalAmount' => $stat->sum('sum_amount'),
            'statItems' => $stat->toArray(),
            'user' => $user,
            'wallet' => $wallet,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request, User $user, Wallet $wallet)
    {
        $data = $request->validated();
        $data['amount'] = ($request->amount * ($request->type === TypeEnum::DEPOSIT->value ? +1 : -1));
        $data['transactioned_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $request->transactioned_at);

        $wallet->transactions()->create($data);

        return redirect()->route('wallets.index', [
            'user' => $user,
        ]);
    }
}
