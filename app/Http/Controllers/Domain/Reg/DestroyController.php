<?php

namespace App\Http\Controllers\Domain\Reg;

use App\Models\DomainReg;
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
    public function __invoke(DomainReg $domainReg)
    {
        $domainReg = $domainReg->delete();
        return response()->json([
            'success' => true,
            'domainRegs' => $domainReg
        ], 200);
    }
}
