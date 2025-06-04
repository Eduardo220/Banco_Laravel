<?php

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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')
                ->constrained('account')
                ->onDelete('cascade');
            $table->enum('type', ['deposit', 'withdraw', 'transfer_in', 'transfer_out']);
            $table->decimal('amount', 15, 2);
            $table->string('description')
                ->nullable();
            $table->enum('status', ['pending', 'completed', 'failed', 'reversed'])
                ->default('completed');
            $table->timestamps();
            $table->index(['account_id', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
