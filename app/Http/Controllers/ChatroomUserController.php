<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatroomUser;

class ChatroomUserController extends Controller
{
    public function show($chatroom_id)
    {
        $chatroomUser = chatroomUser::where('chatroom_id', $chatroom_id)->orderBy('created_at', 'DESC')->first();
        if (!$chatroomUser) {
            return response()->json([
                'status' => 'Fail',
                'message' => 'chatroomUser not found'
            ], 404);
        }

        return response()->json([
            'status' => 'Success',
            'message' => 'Fetch successfully',
            'data' => $chatroomUser
        ], 200);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'members' => 'nullable|array',
            'status' => 'nullable|string|max:255',
        ]);

        $chatroomUser = ChatroomUser::find($id);

        if (!$chatroomUser) {
            return response()->json(['message' => 'ChatroomUser not found'], 404);
        }

        $isUpdated = $chatroomUser->update($request->only(['members', 'status']));

        if ($isUpdated) {
            return response()->json([
                'status' => 'Success',
                'message' => 'ChatroomUser updated successfully',
                'data' => $chatroomUser,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Fail',
                'message' => 'Failed to update ChatroomUser',
            ], 500);
        }
    }
}
