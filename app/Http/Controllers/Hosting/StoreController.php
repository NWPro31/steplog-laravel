<?php

namespace App\Http\Controllers\Hosting;

use App\Http\Requests\Hosting\StoreRequest;
use App\Models\Hosting;
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

        $hosting = Hosting::create($data);

        return response()->json([
            'success' => true,
            'hosting' => $hosting
        ], 200);
    }
}
