<?php

namespace App\Http\Controllers;


use App\Jobs\SendMessage;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = User::get();
        return response()->json(compact('users'));
    }

    public function getUserByEmail(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();;
        if (!$user) {
            return response()->json(['status' => 'User not found']);
        }
        return response()->json($user);
    }

    public function sendEmail(Request $request)
    {
        $response = [];
        $email = $request->email;
        $text = $request->text;
        if (empty($text)) {
            return response()->json(['status' => "text required"]);
        }
        if ($email == 'all') {
            SendMessage::dispatch($email, $text);
            return response()->json(['status' => "messages sent"]);
        }
        $user = User::where('email', '=', $email)->first();
        if (!$user) {
            return response()->json(['status' => 'User not found']);
        }
        SendMessage::dispatch($email, $text, $user->name);
        return response()->json($response['status'] = 'Message sent');

    }
}
