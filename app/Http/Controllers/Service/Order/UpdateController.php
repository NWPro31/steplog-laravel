<?php

namespace App\Http\Controllers\Service\Order;

use App\Http\Requests\Service\Order\UpdateRequest;
use App\Models\OrderService;
use App\Models\StatusOrderService;
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
    public function __invoke(UpdateRequest $request, OrderService $orderService)
    {
        $data = $request->validated();
        $orderId = $orderService->id;

        $priceEdit = $orderService->price !== $data["price"];

        $orderService = $orderService->update($data);
        if($priceEdit) {
            $status = StatusOrderService::create(
                [
                    'order_id' => $orderId,
                    'title' => 'Установлена новая стоимость заказа',
                    'description' => 'Стоимость выполнения заказа '.$data["price"].'р.',
                    'user_id' => auth()->user()->getAuthIdentifier()
                ]
            );
        }

        return response()->json([
            'success' => true,
            'order_service' => $orderService,
            'status' => $status
        ], 200);
    }
}
