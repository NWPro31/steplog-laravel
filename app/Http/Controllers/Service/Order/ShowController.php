<?php

namespace App\Http\Controllers\Service\Order;

use App\Http\Resources\Service\Order\OrderServiceResource;
use App\Http\Resources\Service\Order\Status\StatusOrderServiceResource;
use App\Models\OrderService;
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
    public function __invoke(OrderService $orderService)
    {
        //$orderServices = OrderService::all();
        //if(auth()->user()->role === "admin") $orderServices = OrderService::all();
        //else $orderServices = User::find(auth()->user()->getAuthIdentifier())->orderService;

        $statusOrderServices = StatusOrderService::all()->where('order_id', $orderService->id);

        return response()->json([
            'success' => true,
            'order_service' => new OrderServiceResource($orderService),
            'status' => StatusOrderServiceResource::collection($statusOrderServices)
        ], 200);
    }
}
