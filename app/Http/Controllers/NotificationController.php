<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Message;

class NotificationController extends Controller
{
    public function showNotifications()
{
    $notifications = Auth::user()->notifications;
    // $unreadCount = $user->unreadNotifications()->count();
    return view('notifications', compact('notifications'));
}
}