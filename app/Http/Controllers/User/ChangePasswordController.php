<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
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
    public function __invoke(ChangePasswordRequest $request)
    {
        $data = $request->validated();
        try
        {
            if ((Hash::check($data["old_password"], auth()->user()->getAuthPassword())) === false) {
                return response()->json([
                    'success' => false,
                    'message' => 'Check your old password.'
                ], 400);
            }elseif ((Hash::check($data["new_password"], auth()->user()->getAuthPassword())) === true) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please enter a password which is not similar then current password.'
                ], 400);
            }else
            {
                $user = User::find(auth()->user()->getAuthIdentifier());
                $user = $user->update([
                    'password' => Hash::make($data['new_password'])
                ]);

                return response()->json([
                    'success' => true,
                    'pass' => $user
                ], 200);
            }
        }catch (\Exception $exception)
        {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }
}
