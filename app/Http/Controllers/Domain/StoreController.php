<?php

namespace App\Http\Controllers\Domain;

use App\Http\Requests\Domain\StoreRequest;
use App\Models\Domain;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class StoreController extends Controller
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
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $domain = Domain::create($data);

        return response()->json([
            'success' => true,
            'domain' => $domain
        ], 200);
    }
}
