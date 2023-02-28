<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Resources\Invoice\InvoiceResource;
use App\Models\Invoice;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class IndexController extends Controller
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
    public function __invoke()
    {
        $invoices = Invoice::all();
        return response()->json([
            'success' => true,
            'invoices' => InvoiceResource::collection($invoices)
        ], 200);
    }
}
