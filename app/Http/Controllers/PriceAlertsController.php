<?php

namespace App\Http\Controllers;

use App\Models\PriceAlerts;
use App\Http\Requests\PriceAlertsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PriceAlertsController extends Controller
{
    public function index()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Fetch all price alerts for the authenticated user
        $priceAlerts = PriceAlerts::where('user_id', $userId)->get();

        // Return the alerts as a JSON response
        return response()->json($priceAlerts);
    }

    public function store(PriceAlertsRequest $request)
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Create a new price alert for the user
        $priceAlert = PriceAlerts::create([
            'user_id' => $userId,
            'cryptocurrency_name' => $request->cryptocurrency_name,
            'target_price' => $request->target_price,
        ]);

        // Return the newly created price alert as a JSON response
        return response()->json($priceAlert);
    }

    public function update(PriceAlertsRequest $request, $id)
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Find the price alert by ID for the authenticated user
        $priceAlert = PriceAlerts::where('user_id', $userId)
            ->where('id', $id)
            ->firstOrFail();

        // Update the price alert's data
        $priceAlert->update([
            'cryptocurrency_name' => $request->cryptocurrency_name,
            'target_price' => $request->target_price,
        ]);

        // Return the updated price alert as a JSON response
        return response()->json($priceAlert);
    }

    public function destroy($id)
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Find the price alert by ID for the authenticated user
        $priceAlert = PriceAlerts::where('user_id', $userId)
            ->where('id', $id)
            ->firstOrFail();

        // Delete the price alert
        $priceAlert->delete();

        // Return a success message as a JSON response
        return response()->json(['message' => 'Price alert deleted successfully']);
    }
}
