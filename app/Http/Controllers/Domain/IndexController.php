<?php

namespace App\Http\Controllers\Domain;

use App\Http\Resources\Domain\DomainResource;
use App\Models\Domain;
use App\Models\DomainReg;
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
        $domains = Domain::all();
        return response()->json([
            'success' => true,
            'domains' => DomainResource::collection($domains)
        ], 200);
    }
}
