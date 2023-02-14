<?php

namespace App\Http\Controllers\Hosting;

use App\Models\Hosting;
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
    public function __invoke(Hosting $hosting)
    {
        $hosting = $hosting->delete();
        return response()->json([
            'success' => true,
            'hostings' => $hosting
        ], 200);
    }
}
