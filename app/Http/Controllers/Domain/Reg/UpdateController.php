<?php

namespace App\Http\Controllers\Domain\Reg;

use App\Http\Requests\DomainReg\UpdateRequest;
use App\Models\DomainReg;
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
    public function __invoke(UpdateRequest $request, DomainReg $domainReg)
    {
        $data = $request->validated();

        $domainReg = $domainReg->update($data);

        return response()->json([
            'success' => true,
            'domainReg' => $domainReg
        ], 200);
    }
}
