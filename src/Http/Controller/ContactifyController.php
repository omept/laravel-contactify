<?php

namespace Onwuasoanya\Contactify\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Onwuasoanya\Contactify\Mail\ContactifyMailable;
use Onwuasoanya\Contactify\Models\Contactify;

class ContactifyController extends Controller
{
    public function postContact(Request $request)
    {

        // configuration variables
        $successful_session_flash_key = config('contactify.successful_session_flash_key', '');
        $successful_contactify_saving_message = config('contactify.successful_contactify_saving_message', '');
        $successful_redirect_to = config('contactify.successful_redirect_to', '');
        $failed_session_flash_key = config('contactify.failed_session_flash_key', '');
        $failed_contactify_saving_message = config('contactify.failed_contactify_saving_message', '');
        $failed_redirect_to = config('contactify.failed_redirect_to', '');

        $enable_exception_message = config('contactify.enable_exception_message', false);
        $send_as_email = config('contactify.send_as_email', false);
        $form_email_recipient = config('contactify.form_email_recipient', false);

        try {

            $data = $request->all();
            unset($data['_token']);
            Contactify::create($data);

            $request->session()->flash($successful_session_flash_key, $successful_contactify_saving_message);
            if($send_as_email){
                 Mail::to($form_email_recipient)->send(new ContactifyMailable())   ;
            }

            return redirect()->to($successful_redirect_to);

        } catch (\Exception $e) {
            $message = $e->getMessage();
            if ($enable_exception_message) {
                $request->session()->flash($failed_session_flash_key, $message);
            } else {
                $request->session()->flash($failed_session_flash_key, $failed_contactify_saving_message);
            }

            return redirect()->to($failed_redirect_to);
        }
    }

    //

    public function embed()
    {
        return view("contactify::embed");
    }
}
