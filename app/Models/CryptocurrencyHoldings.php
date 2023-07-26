<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CryptocurrencyHoldings extends Model
{
    protected $fillable = [
        'user_id', // Foreign key to relate holdings to a user
        'cryptocurrency_name',
        'amount_held',
        'value_in_usd',
    ];
}
