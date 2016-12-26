<?php

namespace CodeCommerce\Listeners;

use Mail;
use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailCheckout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        $user = $event->getUser();

        $order = $event->getOrder();

        Mail::send('emails.thanks', ['user' => $user, 'order' => $order], function ($m) use ($user) {
            $m->from('startech.webstore@gmail.com', 'Star Tech');

            $m->to($user->email, $user->name)->subject('We received your order!');
        });
    }
}
