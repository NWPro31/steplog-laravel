<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Resources\Invoice\InvoiceResource;
use App\Models\Invoice;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

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
        if(auth()->user()->role === "admin") $tickets = Ticket::all();
        else $tickets = User::find(auth()->user()->getAuthIdentifier())->tickets;

        return response()->json([
            'success' => true,
            'tickets' => $tickets
        ], 200);
    }
}
