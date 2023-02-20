<?php

namespace App\Http\Controllers\Service;

use App\Models\Service;
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
        $services = Service::all();
        return response()->json([
            'success' => true,
            'services' => $services
        ], 200);
    }
}
