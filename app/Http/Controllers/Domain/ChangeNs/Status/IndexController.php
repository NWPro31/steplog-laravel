<?php

namespace App\Http\Controllers\Domain\ChangeNs\Status;

use App\Http\Resources\Domain\ChangeNs\ChangeNsDomainResource;
use App\Models\ChangeDomainNs;
use App\Models\StatusChangeDomainNs;
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

        $changeDomainNsStatus = StatusChangeDomainNs::all();

        return response()->json([
            'success' => true,
            'change_ns_status' => $changeDomainNsStatus
        ], 200);
    }
}
