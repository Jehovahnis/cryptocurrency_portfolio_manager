<?php

namespace App\Http\Requests;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\PriceAlertsRequest;
use App\Models\PriceAlerts;

class CryptocurrencyHoldings extends Model
{

    public function store(PriceAlertsRequest $request)
{
    // Validation passed, create the model
    PriceAlerts::create($request->validated());

    // Rest of the logic
}

}