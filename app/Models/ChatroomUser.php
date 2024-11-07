<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatroomUser extends Model
{
    use HasFactory;

    protected $fillable = ['chatroom_id', 'members', 'status'];
    protected $table = 'chatroom_users';

    protected $casts = [
        'members' => 'array',
    ];
}
