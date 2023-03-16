<?php

namespace App\Http\Controllers\Domain\Order;

use App\Http\Requests\Domain\Order\StoreRequest;
use App\Models\ContactRuDomain;
use App\Models\Domain;
use App\Models\Invoice;
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
            $data["user_id"] = auth()->user()->getAuthIdentifier();
            $url = $data["url"];
            $domain_id = $data["domain_id"];
            $ns = json_encode($data["ns"]);
            unset($data["url"], $data["domain_id"], $data["ns"]);

            $contact_ru = ContactRuDomain::create($data);

            $data["price"] = Domain::find($domain_id)->price;

            $order_domain = OrderDomain::create(
                [
                    'user_id' => $data["user_id"],
                    'domain_id' => $domain_id,
                    'contact_ru_id' => $contact_ru->id,
                    'url' => $url,
                    'price' => $data["price"],
                    'ns' => $ns,
                    'status_id' => 1
                ]
            );

            $invoice = Invoice::create(
                [
                    'domain_order_id' => $order_domain->id,
                    'title' => 'Регистрация домена '.$url,
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
            'domain' => $order_domain,
            'contact' => $contact_ru,
            'invoice' => $invoice
        ], 200);
    }
}
