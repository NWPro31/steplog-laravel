<?php

namespace App\Http\Controllers\Hosting\Order;

use App\Http\Requests\Hosting\Order\StoreRequest;
use App\Models\ContactRuDomain;
use App\Models\Domain;
use App\Models\Hosting;
use App\Models\Invoice;
use App\Models\OrderDomain;
use App\Models\OrderHosting;
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
            $data["user_id"] = auth()->user()->getAuthIdentifier();

            $data["price"] = Hosting::find($data["hosting_id"])->price;

            $data["status_id"] = 1;

            $order_hosting = OrderHosting::create($data);

            $invoice = Invoice::create(
                [
                    'hosting_order_id' => $order_hosting->id,
                    'title' => 'Активация хостинга '.$data["name"],
                    'user_id' => $data["user_id"],
                    'amount' => $data["price"],
                    'status_id' => 1
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
            'hosting' => $order_hosting,
            'invoice' => $invoice
        ], 200);
    }
}
