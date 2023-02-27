<?php

namespace App\Http\Controllers\Service\Order\Comment;

use App\Http\Resources\Service\Order\Comment\CommentOrderServiceResource;
use App\Models\CommentOrderService;
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
    public function __invoke(CommentOrderService $commentOrder)
    {
        //$orderServices = OrderService::all();
        if(auth()->user()->role === "admin") $commentOrderServices = CommentOrderService::all()->where('order_id', $commentOrder->id);
        else $commentOrderServices = User::find(auth()->user()->getAuthIdentifier())->commentOrderService;

        return response()->json([
            'success' => true,
            'comment_order' => CommentOrderServiceResource::collection($commentOrderServices)
        ], 200);
    }
}
