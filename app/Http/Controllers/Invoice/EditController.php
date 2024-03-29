<?php

namespace App\Http\Controllers\Invoice;

use App\Models\Hosting;
use App\Models\Invoice;
use App\Models\StatusInvoice;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class EditController extends Controller
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
    public function __invoke(Invoice $invoice)
    {
        $status = StatusInvoice::all();

        return response()->json([
            'success' => true,
            'invoice' => $invoice,
            'status' => $status
        ], 200);
    }
}
