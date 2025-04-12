<?php

namespace App\Http\Controllers;

use App\Mail\ContactRequestReceived;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function create()
    {
        return view('base.contact'); 
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    Contact::create($validated);

    $text = "📩 *Yangi kontakt xabari!*\n"
          . "*Ism:* {$validated['name']}\n"
          . "*Email:* {$validated['email']}\n"
          . "*Mavzu:* {$validated['subject']}\n"
          . "*Xabar:* {$validated['message']}";

    $this->sendToTelegram($text);

    return redirect()->back()->with('success', 'Xabaringiz yuborildi!');
}

private function sendToTelegram($message)
{
    Http::post("https://api.telegram.org/bot" . env('TELEGRAM_BOT_TOKEN') . "/sendMessage", [
        'chat_id' => env('TELEGRAM_CHAT_ID'),
        'text' => $message,
        'parse_mode' => 'Markdown',
    ]);
}
}
