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
            $table->string('description');
            $table->string('code')->unique();
            $table->decimal('rate_euro', 10, 2);
            $table->date('date_paid');
            $table->enum('category', ['income', 'expense']); // Hardcoded categories
            $table->string('nama_transaksi');
            $table->decimal('nominal'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
