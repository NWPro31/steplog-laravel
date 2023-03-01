<?php

namespace App\Http\Controllers\Service\Order;

use App\Models\OrderService;
use App\Models\Service;
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
    public function __invoke(OrderService $orderService)
    {
        if(auth()->user()->role !== "admin") {
            return response()->json([
                'success' => false,
                'message' => 'Доступ запрещен'
            ], 403);
        }
        return response()->json([
            'success' => true,
            'order_service' => $orderService
        ], 200);
    }
}
