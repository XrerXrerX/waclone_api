<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property array $members
 */
class Chatroom extends Model
{
    use HasFactory;

    protected $fillable = ['owner_id', 'name', 'members', 'max_members'];
    protected $table = 'chatrooms';

    protected $casts = [
        'members' => 'array',
    ];


    public function chatroomUsers()
    {
        return $this->hasMany(ChatroomUser::class, 'chatroom_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'chatroom_id', 'id');
    }
}
