<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Requests\Ticket\StoreRequest;
use App\Models\Hosting;
use App\Models\MessageTicket;
use App\Models\Service;
use App\Models\Ticket;
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
            $message = $data["message"];
            unset($data["message"]);
            $order = $data["order"];
            if(count($order) > 0){
                $data["service_order_id"] = $order[0] === 'service_order_id' ? $order[1] : null;
                $data["domain_order_id"] = $order[0] === 'domain_order_id' ? $order[1] : null;
                $data["hosting_order_id"] = $order[0] === 'hosting_order_id' ? $order[1] : null;
            }
            unset($data["order"]);
            $ticket = Ticket::create($data);
            $messageTicket = MessageTicket::create(
                [
                    'user_id' => $user_id,
                    'message' => $message,
                    'ticket_id' => $ticket->id
                ]
            );
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
            'ticket' => $ticket,
            'messageTicket' => $messageTicket
        ], 200);
    }
}
