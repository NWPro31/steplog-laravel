<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\User\BaseController;
use App\Models\User;

class IndexController extends BaseController
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
     * @return \Illuminate\Contracts\Support\Renderable
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
