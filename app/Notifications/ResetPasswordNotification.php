<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(readonly string $token)
    {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Redefinição de senha')
                    ->greeting('Olá!')
                    ->line('Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha para sua conta.')
                    ->action('Redefinir senha', url("/?token=$this->token"))
                    ->line('O link de redefinição de senha expirará em 60 minutos.')
                    ->line('Se você não solicitou este procedimento, desconsidere este e-mail.')
                    ->line('Atenciosamente,')
                    ->salutation('Connect Courses');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
