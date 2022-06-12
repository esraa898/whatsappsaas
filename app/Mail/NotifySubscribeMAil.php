<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifySubscribeMAil extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user;
    public function __construct( $user)
    {
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return  $this->from('whatsapp@saas.com')
            ->subject('notifysubscribe')
            ->with([
                'name'=>$this->user->username,
                'package'=>$this->user->package->name
            ])
        ->markdown('mail.notify-subscribe-m-ail');
    }
}
