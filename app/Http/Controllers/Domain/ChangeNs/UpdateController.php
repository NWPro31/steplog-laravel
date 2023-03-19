<?php

namespace App\Http\Controllers\Domain\ChangeNs;

use App\Http\Requests\Domain\ChangeNs\UpdateRequest;
use App\Models\ChangeDomainNs;
use App\Models\OrderDomain;
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
    public function __invoke(UpdateRequest $request, ChangeDomainNs $statusChangeDomainNs)
    {
        if(auth()->user()->role !== "admin") return response()->json([
            'success' => false,
            'message' => 'Restricted area'
        ], 403);

        $data = $request->validated();
        try
        {
            $statusChangeDomainNs = $statusChangeDomainNs->update($data);
        }
        catch (\Exception $exception)
        {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }


        return response()->json([
            'success' => true,
            'change_domain_ns' => $statusChangeDomainNs
        ], 200);
    }
}
