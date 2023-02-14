<?php

namespace App\Http\Controllers\Hosting;

use App\Http\Requests\Hosting\UpdateRequest;
use App\Models\Hosting;
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
    public function __invoke(UpdateRequest $request, Hosting $hosting)
    {
        $data = $request->validated();
        try{
            $hosting->update($data);
        }catch (\Exception $e){
            $hosting = $e->getMessage();
        }
        $hosting->update($data);

        return response()->json([
            'success' => true,
            'hosting' => $hosting
        ], 200);
    }
}
