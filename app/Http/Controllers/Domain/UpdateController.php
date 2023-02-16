<?php

namespace App\Http\Controllers\Domain;

use App\Http\Requests\Domain\UpdateRequest;
use App\Models\Domain;
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
    public function __invoke(UpdateRequest $request, Domain $domain)
    {
        $data = $request->validated();

        $domain = $domain->update($data);

        return response()->json([
            'success' => true,
            'domain' => $domain
        ], 200);
    }
}
