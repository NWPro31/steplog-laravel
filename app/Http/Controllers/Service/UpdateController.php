<?php

namespace App\Http\Controllers\Service;

use App\Http\Requests\Service\UpdateRequest;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class UpdateController extends Controller
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
    public function __invoke(UpdateRequest $request, Service $service)
    {
        $data = $request->validated();

        $service = $service->update($data);

        return response()->json([
            'success' => true,
            'service' => $service
        ], 200);
    }
}
