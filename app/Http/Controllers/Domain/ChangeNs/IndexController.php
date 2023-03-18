<?php

namespace App\Http\Controllers\Domain\ChangeNs;

use App\Http\Resources\Domain\ChangeNs\ChangeNsDomainResource;
use App\Models\ChangeDomainNs;
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
        if(auth()->user()->role === "admin") $changeDomainNs = ChangeDomainNs::all();
        else $changeDomainNs = User::find(auth()->user()->getAuthIdentifier())->changeDomainNs;
        return response()->json([
            'success' => true,
            'change_domain_ns' => ChangeNsDomainResource::collection($changeDomainNs)
        ], 200);
    }
}
