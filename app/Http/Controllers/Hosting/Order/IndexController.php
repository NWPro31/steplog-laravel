<?php

namespace App\Http\Controllers\Hosting\Order;

use App\Http\Resources\Domain\Order\OrderDomainResource;
use App\Http\Resources\Hosting\Order\OrderHostingResource;
use App\Http\Resources\Service\Order\OrderServiceResource;
use App\Models\OrderDomain;
use App\Models\OrderHosting;
use App\Models\OrderService;
use App\Models\User;
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
        //$orderServices = OrderService::all();
        if(auth()->user()->role === "admin") $orderHostings = OrderHosting::all();
        else $orderHostings = User::find(auth()->user()->getAuthIdentifier())->orderHosting;

        return response()->json([
            'success' => true,
            'order_hostings' => OrderHostingResource::collection($orderHostings)
        ], 200);
    }
}
