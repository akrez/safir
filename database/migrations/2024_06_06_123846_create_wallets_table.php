<?php

use App\Enums\Wallet\StatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('status', [
                StatusEnum::ACTIVE->value,
                StatusEnum::DEACTIVE->value,
                StatusEnum::ARCHIVED->value,
            ]);
            $table->text('des')->nullable();
            $table->double('amount')->nullable()->default(0);
            $table->timestamp('transactioned_at')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallets');
    }
};
