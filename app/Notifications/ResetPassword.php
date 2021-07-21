<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
class ResetPassword  extends ResetPasswordNotification
{
    use Queueable;

    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(Lang::get('Solicitud de restablecimiento de contraseña'))
            ->line(Lang::get('Hola, se solicitó un restablecimiento de contraseña para tu cuenta ' . $notifiable->getEmailForPasswordReset() . ', haz clic en el botón que aparece a continuación para cambiar tu contraseña.'))
            ->action(Lang::get('Cambiar contraseña'), url(config('app.url') . route('password.reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()], false)))
            ->line(Lang::get('Si tu no realizaste la solicitud de cambio de contraseña, solo ignora este mensaje. '))
            ->line(Lang::get('Este enlace solo es válido dentro de los proximos :count minutos.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]));
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
