<?php

namespace App\Http\Controllers\Ticket\Message;

use App\Http\Requests\Ticket\ShowRequest;
use App\Http\Resources\Service\Order\OrderServiceResource;
use App\Http\Resources\Service\Order\Status\StatusOrderServiceResource;
use App\Http\Resources\Ticket\Message\TicketMessagesResource;
use App\Http\Resources\Ticket\TicketResource;
use App\Models\MessageTicket;
use App\Models\OrderService;
use App\Models\StatusOrderService;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ShowController extends Controller
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
    public function __invoke(Ticket $ticketId)
    {
        try {
            if(auth()->user()->role === "admin" || auth()->user()->getAuthIdentifier() === $ticketId->user_id)
            {
                $messageTicket = MessageTicket::where('ticket_id', $ticketId->id)->get();
            }
            else
            {
                return response()->json([
                    'success' => false,
                    'message' => 'Access denied'
                ], 403);
            }
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
            'ticket' => new TicketResource($ticketId),
            'ticket_messages' => TicketMessagesResource::collection($messageTicket)
        ], 200);
    }
}
