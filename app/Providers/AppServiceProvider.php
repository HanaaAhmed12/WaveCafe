<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Message;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
     {
    //     View::composer('admin.showMessage', function ($view) {
    //         $message = Message::latest()->first(); // Fetch latest message
    //         $view->with('message', $message);
    //     });


    View::composer('*', function ($view) {
        $messages = Message::all();
        $unreadMessages = Message::whereNull('read_at')->get();

        $unreadCount = $unreadMessages->count();
        $view->with('unreadCount', $unreadCount)->with('messages', $unreadMessages)
        ->with('messages', $messages);
    });
    }
}
