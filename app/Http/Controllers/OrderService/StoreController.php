<?php

namespace App\Http\Controllers\OrderService;

use App\Http\Requests\OrderService\StoreRequest;
use App\Models\OrderService;
use App\Models\StatusOrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Tymon\JWTAuth\Contracts\Providers\Auth;


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

        $data["user_id"] = auth()->user()->getAuthIdentifier();

        $service = OrderService::create($data);

        $status = StatusOrderService::create(
            [
                'order_id' => $service->id,
                'title' => 'Ожидает обработки'
            ]
        );

        return response()->json([
            'success' => true,
            'service' => $service,
            'status' => $status
        ], 200);
    }
}
