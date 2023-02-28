<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Requests\Invoice\UpdateRequest;
use App\Models\Invoice;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class UpdateController extends Controller
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
        $data = $request->validated();

        $invoice = $invoice->update($data);

        return response()->json([
            'success' => true,
            'invoice' => $invoice
        ], 200);
    }
}
