<?php

namespace App\Http\Controllers\Hosting;

use App\Models\Hosting;
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
        $hostings = Hosting::all();
        return response()->json([
            'success' => true,
            'users' => $hostings
        ], 200);
    }
}
