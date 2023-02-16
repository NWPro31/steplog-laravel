<?php

namespace App\Http\Controllers\Domain;

use App\Models\Domain;
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
    public function __invoke(Domain $domain)
    {
        $domain = $domain->delete();
        return response()->json([
            'success' => true,
            'domains' => $domain
        ], 200);
    }
}
