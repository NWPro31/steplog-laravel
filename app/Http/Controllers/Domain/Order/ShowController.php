<?php

namespace App\Http\Controllers\Domain\Order;

use App\Http\Resources\Domain\Order\OrderDomainResource;
use App\Http\Resources\Service\Order\OrderServiceResource;
use App\Http\Resources\Service\Order\Status\StatusOrderServiceResource;
use App\Models\OrderDomain;
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
    public function __invoke(OrderDomain $orderDomain)
    {

        return response()->json([
            'success' => true,
            'order_domain' => new OrderDomainResource($orderDomain)
        ], 200);
    }
}
