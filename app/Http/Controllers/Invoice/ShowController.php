<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Resources\Service\Order\OrderServiceResource;
use App\Http\Resources\Service\Order\Status\StatusOrderServiceResource;
use App\Http\Resources\Setting\BankAccountResource;
use App\Models\Invoice;
use App\Models\OrderService;
use App\Models\Setting;
use App\Models\StatusOrderService;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class ShowController extends Controller
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
        //$orderServices = OrderService::all();
        //if(auth()->user()->role === "admin") $orderServices = OrderService::all();
        //else $orderServices = User::find(auth()->user()->getAuthIdentifier())->orderService;

        $bankAccount = Setting::where('item', 'bankAccount')->get();

        return response()->json([
            'success' => true,
            'invoice' => $invoice,
            'bank_account' => new BankAccountResource($bankAccount->first())
        ], 200);
    }
}
