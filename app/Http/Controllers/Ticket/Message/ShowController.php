<?php

namespace App\Http\Controllers\Ticket\Message;

use App\Http\Requests\Ticket\ShowRequest;
use App\Http\Resources\Service\Order\OrderServiceResource;
use App\Http\Resources\Service\Order\Status\StatusOrderServiceResource;
use App\Http\Resources\Ticket\Message\TicketMessagesResource;
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
    public function __invoke(ShowRequest $request)
    {
        $data = $request->validated();

        //$orderServices = OrderService::all();
        //if(auth()->user()->role === "admin") $orderServices = OrderService::all();
        //else $orderServices = User::find(auth()->user()->getAuthIdentifier())->orderService;

        if(auth()->user()->role === "admin") $messageTicket = MessageTicket::where('ticket_id', $data["ticket_id"])->get();
        else {
            $ticket = Ticket::where([['id', $data["ticket_id"]], ['user_id', auth()->user()->getAuthIdentifier()]])->first();
            $messageTicket = MessageTicket::where('ticket_id', $ticket->id)->get();
        }


        return response()->json([
            'success' => true,
            'ticket_messages' => TicketMessagesResource::collection($messageTicket)
        ], 200);
    }
}
