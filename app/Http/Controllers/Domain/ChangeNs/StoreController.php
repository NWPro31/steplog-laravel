<?php

namespace App\Http\Controllers\Domain\ChangeNs;

use App\Http\Requests\Domain\ChangeNs\StoreRequest;
use App\Models\ChangeDomainNs;
use App\Models\OrderDomain;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

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
        try
        {
            Db::beginTransaction();
            $user_id = auth()->user()->getAuthIdentifier();
            $order_domain_id = OrderDomain::find($data['order_domain_id']);
            $data["ns"] = json_encode($data["ns"]);
            if($order_domain_id->user_id !== $user_id)return response()->json([
                'success' => false,
                'message' => 'Access denied',
                'data' => $data["ns"]
            ], 403);
            $data["status_id"] = 1;
            $change_ns = ChangeDomainNs::create($data);
            $orderDomain = $order_domain_id->update(
                [
                    'ns' => $data["ns"]
                ]
            );

            Db::commit();
        }
        catch (\Exception $exception)
        {
            Db::rollBack();
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }

        return response()->json([
            'success' => true,
            'change_ns' => $change_ns
        ], 200);
    }
}
