<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptocurrencyHoldingsTable extends Migration
{
    public function up()
    {
        Schema::create('cryptocurrency_holdings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to relate holdings to a user
            $table->string('cryptocurrency_name');
            $table->decimal('amount_held', 18, 8);
            $table->decimal('value_in_usd', 18, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cryptocurrency_holdings');
    }
}
