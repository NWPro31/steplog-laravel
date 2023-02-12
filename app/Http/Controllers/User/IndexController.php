<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use App\Models\User;

class IndexController extends Controller
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
    public function __invoke()
    {
        $users = User::all();
        return response()->json([
            'success' => true,
            'users' => $users
        ], 200);
    }
}
