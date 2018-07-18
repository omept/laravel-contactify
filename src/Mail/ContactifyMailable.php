<?php

namespace Onwuasoanya\Contactify\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactifyMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $request_block, $extra_fields;

    public function __construct($request_block, $extra_fields = null)
    {

        $this->request_block = $request_block;
        $this->extra_fields = $extra_fields;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email_view_template = config('contactify.email_view_template', 'contactify::contactify.email');
        $extra_fields = $this->extra_fields;
        $request_block = $this->request_block;
        $email_data= array_merge($request_block, $extra_fields);
        dd($email_data);
        return $this->view($email_view_template)->with($email_data);

    }
}
