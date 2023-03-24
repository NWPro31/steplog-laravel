<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
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
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();
        $user = User::find(auth()->user()->getAuthIdentifier());
        $user->update($data);

        return response()->json([
            'success' => true,
            'user' => $user
        ], 200);
    }
}
