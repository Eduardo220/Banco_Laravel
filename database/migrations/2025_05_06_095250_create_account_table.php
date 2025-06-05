<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('cascade');

            $table->string('name_account');
            $table->string('number_account')->unique();
            $table->string('type_account');
            $table->integer('agency_account');
            $table->decimal('balance_account', 15, 2)->default(0); // mais seguro que float
            $table->string('status_account')->default('ativa');   // opcional: define valor padrão
            $table->unique(['user_id', 'type_account']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('account');
    }
};
