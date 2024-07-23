<?php

// Message.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'message', 'read_at'];

    // Add a method to mark the message as read
    public function markAsRead()
    {
        $this->update(['read_at' => now()]);
    }
}