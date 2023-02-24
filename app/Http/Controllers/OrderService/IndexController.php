<?php

namespace App\Http\Controllers\OrderService;

use App\Http\Resources\OrderService\OrderServiceResource;
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
        $orderServices = User::find(auth()->user()->getAuthIdentifier())->orderService;

        return response()->json([
            'success' => true,
            'order_services' => OrderServiceResource::collection($orderServices)
        ], 200);
    }
}
