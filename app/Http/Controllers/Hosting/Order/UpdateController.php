<?php

namespace App\Http\Controllers\Hosting\Order;

use App\Http\Requests\Hosting\Order\UpdateRequest;
use App\Models\ChangeDomainNs;
use App\Models\OrderDomain;
use App\Models\OrderHosting;
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
    public function __invoke(UpdateRequest $request, OrderHosting $statusHosting)
    {
        if(auth()->user()->role !== "admin") return response()->json([
            'success' => false,
            'message' => 'Restricted area'
        ], 403);

        $data = $request->validated();
        try
        {
            $statusHosting = $statusHosting->update($data);
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
            'change_hosting_status' => $statusHosting
        ], 200);
    }
}
