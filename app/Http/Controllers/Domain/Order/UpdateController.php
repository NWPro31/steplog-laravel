<?php

namespace App\Http\Controllers\Domain\Order;

use App\Http\Requests\Domain\Order\UpdateRequest;
use App\Models\OrderDomain;
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
    public function __invoke(UpdateRequest $request, OrderDomain $orderDomain)
    {
        if(auth()->user()->role !== "admin") return response()->json([
            'success' => false,
            'message' => 'Restricted area'
        ], 403);

        $data = $request->validated();
        try
        {
            $orderDomain = $orderDomain->update($data);
        }
        catch (\Exception $exception)
        {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }


        return response()->json([
            'success' => true,
            'order_domain' => $orderDomain
        ], 200);
    }
}
