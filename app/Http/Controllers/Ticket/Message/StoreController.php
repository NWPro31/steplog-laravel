<?php

namespace App\Http\Controllers\Ticket\Message;

use App\Http\Requests\Ticket\Message\StoreRequest;
use App\Http\Resources\Ticket\Message\TicketMessagesResource;
use App\Models\MessageTicket;
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
        try
        {
            $data = $request->validated();
            $user_id = auth()->user()->getAuthIdentifier();
            $data["user_id"] = $user_id;
            $messageTicket = MessageTicket::create($data);
        }
        catch (\Exception $exception)
        {
            return response()->json([
                'success' => false,
                'ticket' => $exception->getMessage()
            ], 500);
        }
        return response()->json([
            'success' => true,
            'messageTicket' => new TicketMessagesResource($messageTicket)
        ], 200);
    }
}
