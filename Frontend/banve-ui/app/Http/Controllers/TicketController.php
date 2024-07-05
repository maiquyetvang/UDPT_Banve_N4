<?php

// app/Http/Controllers/TicketController.php
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketPurchaseConfirmation; // Đây là mẫu email bạn cần tạo
class TicketController extends Controller
{
    public function sendTicketEmail(Request $request)
    {
        $orderId = $request->input('orderId');
        $ticket = Ticket::where('orderId', $orderId)->first();

        if (!$ticket) {
            return response()->json(['error' => 'Ticket not found'], 404);
        }

        // Gửi email cho khách hàng
        Mail::to($ticket->maKh)->send(new TicketPurchaseConfirmation($ticket));

        return response()->json(['message' => 'Email sent successfully'], 200);
    }
}
