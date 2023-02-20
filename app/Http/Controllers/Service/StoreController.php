<?php

namespace App\Http\Controllers\Service;

use App\Http\Requests\Service\StoreRequest;
use App\Models\Hosting;
use App\Models\Service;
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

        $service = Service::create($data);

        return response()->json([
            'success' => true,
            'service' => $service
        ], 200);
    }
}
