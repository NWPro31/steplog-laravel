<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Requests\Invoice\UpdateRequest;
use App\Models\Invoice;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class StoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Show the application dashboard.
     *
     * @return JsonResponse
     */
    public function __invoke(UpdateRequest $request, Invoice $invoice)
    {
        try
        {
            $data = $request->validated();

            $data["user_id"] = auth()->user()->getAuthIdentifier();
            $data["status_id"] = 1;
            $invoice = Invoice::create($data);
        }catch (\Exception $exception)
        {
            return response()->json([
                'success' => false,
                'invoice' => $exception->getMessage()
            ], 500);
        }

        return response()->json([
            'success' => true,
            'invoice' => $invoice
        ], 200);
    }
}
