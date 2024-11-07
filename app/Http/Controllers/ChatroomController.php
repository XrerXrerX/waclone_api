<?php

namespace App\Http\Controllers;

use App\Models\Chatroom;
use App\Models\ChatroomUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChatroomController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'max_members' => 'nullable|integer|min:1',
            ]);

            $userId = $request->user()->id;

            $chatroom = Chatroom::create([
                'owner_id' => $userId,
                'name' => $request->name,
                'members' => [$userId],
                'max_members' => $request->max_members ?? 5,
            ]);

            if ($chatroom) {
                ChatroomUser::create([
                    'chatroom_id' => $chatroom->id,
                    'members' => [$userId],
                    'status' => 1
                ]);
            }

            return response()->json([
                'status' => 'Success',
                'message' => 'Chatroom created successfully',
                'chatroom' => $chatroom
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Fail',
                'message' => 'Failed to create chatroom',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function addMembers(Request $request, $chatroom_id)
    {
        try {
            $request->validate([
                'members' => 'nullable|array',
            ]);

            $dataChatroom = Chatroom::find($chatroom_id);
            if (!$dataChatroom) {
                return response()->json([
                    'status' => 'Fail',
                    'message' => 'Chatroom not found'
                ], 404);
            }

            $currentMembers = $dataChatroom->members ?? [];
            $newMembers = $request->input('members', []);

            $updatedMembers = array_unique(array_merge($currentMembers, $newMembers));

            if (count($updatedMembers) > $dataChatroom->max_members) {
                return response()->json([
                    'status' => 'Fail',
                    'message' => 'Member limit reached'
                ], 400);
            }

            $dataChatroom->update([
                'members' => $updatedMembers,
            ]);

            return response()->json([
                'status' => 'Success',
                'message' => 'Members added successfully',
                'members' => $updatedMembers,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Error',
                'message' => 'An error occurred while adding members',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function index(Request $request)
    {
        try {
            $user = $request->user();

            return response()->json([
                'status' => 'Success',
                'message' => 'Fetched successfully',
                'user' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Error',
                'message' => 'An error occurred during fetching listuser.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function allchatrooms(Request $request)
    {
        $chatrooms = Chatroom::get();
        $chatrooms = $chatrooms->map(function ($chatroom) {
            $chatroom->owner =  User::find($chatroom->owner_id)->name;
            return $chatroom;
        });

        return response()->json([
            'status' => 'Success',
            'message' => 'Fetched successfully',
            'user' => $chatrooms
        ], 200);
    }
}
