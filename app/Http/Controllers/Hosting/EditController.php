<?php

namespace App\Http\Controllers\Hosting;

use App\Models\Hosting;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class EditController extends Controller
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
        return response()->json([
            'success' => true,
            'hostings' => $hosting
        ], 200);
    }
}
