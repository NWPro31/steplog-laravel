<?php

namespace App\Http\Controllers\Service\Order\Invoice;

use App\Http\Requests\Service\Order\Invoice\StoreRequest;
use App\Models\Invoice;
use App\Models\OrderService;
use App\Models\StatusOrderService;
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
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data["user_id"] = OrderService::find($data["service_order_id"])->user_id;
        $invoice = Invoice::create($data);

        $status = StatusOrderService::create(
            [
                'order_id' => $invoice->service_order_id,
                'title' => 'Создан счет на предоплату',
                'user_id' => auth()->user()->getAuthIdentifier()
            ]
        );

        return response()->json([
            'success' => true,
            'invoice' => $invoice,
            'status' => $status
        ], 200);
    }
}
