<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::paginate(10);

        return view('messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[\p{L}\s]+$/u|string|between:5,255',
            'email' => 'required|email:rfc,dns',
            'message' => 'required|regex:/^[\p{L}0-9\s\-\'"\,\.\;\:]+$/u|string|between:5,255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Message::create($validator->validated());

        return redirect()->route('messages.index')->with('success', 'Message created successfully.');
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('messages.index')->with('success', 'Message deleted successfully.');
    }
}
