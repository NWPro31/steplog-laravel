<?php

namespace App\Http\Controllers\Domain\Order;

use App\Http\Requests\Domain\Order\StoreRequest;
use App\Models\ContactRuDomain;
use App\Models\Domain;
use App\Models\OrderDomain;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

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
        $url = $data["url"];
        $domain_id = $data["domain_id"];
        unset($data["url"]);
        unset($data["domain_id"]);
        $contact_ru = ContactRuDomain::create($data);

        $data["price"] = Domain::find($domain_id)->price;

        $order_domain = OrderDomain::create(
            [
                'user_id' => $data["user_id"],
                'domain_id' => $domain_id,
                'contact_ru_id' => $contact_ru->id,
                'url' => $url,
                'price' => $data["price"]
            ]
        );

        return response()->json([
            'success' => true,
            'domain' => $order_domain,
            'contact' => $contact_ru
        ], 200);
    }
}
