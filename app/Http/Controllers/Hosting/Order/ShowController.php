<?php

namespace App\Http\Controllers\Hosting\Order;

use App\Http\Resources\Domain\Order\OrderDomainResource;

use App\Http\Resources\Hosting\Order\OrderHostingResource;
use App\Models\OrderHosting;
use App\Models\StatusOrderHosting;
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
    public function __invoke(OrderHosting $orderHosting)
    {
        $statusOrderHosting = StatusOrderHosting::all();
        return response()->json([
            'success' => true,
            'order_hosting' => new OrderHostingResource($orderHosting),
            'status' => $statusOrderHosting
        ], 200);
    }
}
