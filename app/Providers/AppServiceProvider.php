<?php

namespace App\Providers;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ResetPassword::toMailUsing(function ($notifiable, $token) {
            return (new MailMessage)->view('admin.email.password-reset');
                // ->subject('custom subject')
                // ->line('custom line')
                // ->action(Lang::get('Reset Password'), url(config('app.url') . route('password.reset', ['token' => $token, 'email' =>
                // $notifiable->getemailForPasswordReset()], false)))
                // ->line('another line');
        });
    }
}
