<?php

namespace App\Http\Controllers\Hosting\Order\Status;

use App\Http\Resources\Domain\ChangeNs\ChangeNsDomainResource;
use App\Models\ChangeDomainNs;
use App\Models\StatusChangeDomainNs;
use App\Models\StatusOrderHosting;
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

        $changeHostingStatus = StatusOrderHosting::all();

        return response()->json([
            'success' => true,
            'change_hosting_status' => $changeHostingStatus
        ], 200);
    }
}
