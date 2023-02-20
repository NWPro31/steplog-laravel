<?php

namespace App\Http\Controllers\Service;

use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class DestroyController extends Controller
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
    public function __invoke(Service $service)
    {
        $service = $service->delete();
        return response()->json([
            'success' => true,
            'services' => $service
        ], 200);
    }
}
