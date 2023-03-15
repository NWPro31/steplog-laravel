<?php

namespace App\Http\Controllers\Domain\ContactRu;

use App\Http\Resources\Domain\Order\OrderDomainResource;
use App\Http\Resources\Service\Order\OrderServiceResource;
use App\Models\OrderDomain;
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
        $ContactRuDomains = User::find(auth()->user()->getAuthIdentifier())->orderContactRu;

        return response()->json([
            'success' => true,
            'contact_ru_domains' => $ContactRuDomains
        ], 200);
    }
}
