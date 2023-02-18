<?php

namespace App\Http\Controllers\Domain;

use App\Models\Domain;
use App\Models\DomainReg;
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
    public function __invoke(Domain $domain)
    {
        $domainRegs = DomainReg::all();
        return response()->json([
            'success' => true,
            'domain' => $domain,
            'domainRegs' => $domainRegs
        ], 200);
    }
}
