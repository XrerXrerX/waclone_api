<?php

namespace App\Http\Controllers;

use App\Models\Chatroom;
use App\Models\ChatroomUser;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'chatroom_id' => 'required|exists:chatrooms,id',
                'message_text' => 'nullable|string',
                'attachment_url' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi',
            ]);

            $userId = $request->user()->id;

            $attachmentUrl = null;
            if ($request->hasFile('attachment_url')) {
                $file = $request->file('attachment_url');
                $extension = $file->getClientOriginalExtension();

                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                    $attachmentUrl = $file->store('pictures', 'public');
                } elseif (in_array($extension, ['mp4', 'mov', 'avi'])) {
                    $attachmentUrl = $file->store('videos', 'public');
                } else {
                    return response()->json([
                        'status' => 'Fail',
                        'message' => 'Unsupported file type'
                    ], 400);
                }
            }

            $message = Message::create([
                'chatroom_id' => $request->chatroom_id,
                'sender_id' => $userId,
                'message_text' => $request->message_text,
                'attachment_url' => $attachmentUrl,
            ]);

            return response()->json([
                'status' => 'Success',
                'message' => 'Message created successfully',
                'data' => $message,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Fail',
                'message' => 'Failed to create message',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function index(Request $request, $chatroom_id)
    {
        $messages = Message::where('chatroom_id', $chatroom_id)->get();

        $messages = $messages->map(function ($message) {
            $message->sender_id =  User::find($message->sender_id);
            if ($message->attachment_url) {
                $message->attachment_url = url('/') . '/storage/' . $message->attachment_url;
            }
            return $message;
        });

        return response()->json([
            'status' => 'Success',
            'message' => 'Fetch successfully',
            'data' => $messages
        ], 200);
    }
}
