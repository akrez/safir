<?php

namespace App\Models;

use App\Enums\Transaction\TypeEnum;
use App\Jobs\UpdateWalletAmount;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'amount',
        'type',
    ];

    protected $casts = [
        'type' => TypeEnum::class,
    ];

    protected static function booted(): void
    {
        static::created(function (Transaction $transaction) {
            UpdateWalletAmount::dispatch($transaction);
        });
    }

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }
}
