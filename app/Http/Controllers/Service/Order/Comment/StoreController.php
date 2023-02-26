<?php

namespace App\Http\Controllers\Service\Order\Comment;

use App\Http\Requests\Service\Order\Comment\StoreRequest;
use App\Models\CommentOrderService;
use App\Models\StatusOrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;


class StoreController extends Controller
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
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data["user_id"] = auth()->user()->getAuthIdentifier();

        $comment = CommentOrderService::create($data);

        $status = StatusOrderService::create(
            [
                'order_id' => $comment->order_id,
                'title' => 'Оставлен комментарий',
                'user_id' => auth()->user()->getAuthIdentifier()
            ]
        );

        return response()->json([
            'success' => true,
            'comment' => $comment,
            'status' => $status
        ], 200);
    }
}
