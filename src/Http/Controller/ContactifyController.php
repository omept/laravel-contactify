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
        $admin_email_recipient = config('contactify.admin_email_recipient', 'foo@bar.com');

        try {

            $data = $request->all();
            $data = $this->multi_unset($data, ['_token', 'submit']);

            Contactify::create(['key_indexes' => json_encode(array_keys($data)), 'key_value_pairs' =>  json_encode($data)]);

            $request->session()->flash($successful_session_flash_key, $successful_contactify_saving_message);

            if ($send_as_email) {

                if (!$this->isValidEmail($admin_email_recipient)) {
                    $request->session()->flash($failed_session_flash_key, "Invalid email for recipient.");
                    return redirect()->to($failed_redirect_to);
                }
                $request_array = $this->multi_unset($data, ['_token', 'submit']);
                Mail::to($admin_email_recipient)->send(new ContactifyMailable($request_array));

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


    public function select_array_indexes($array, $keys)
    {
        $val = [];
        if (is_array($array)) {
            foreach ($keys as $key) {
                if (isset($array[$key])) {
                    $val[$key] = $array[$key];
                }

            }

            return $val;

        } else {
            return null;
        }
    }

    public function isValidEmail($email)
    {
        return (boolean)filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email);
    }

    public function multi_unset($array, $keys)
    {
        if (is_array($array)) {
            foreach ($keys as $key) {
                unset($array[$key]);
            }

            return $array;

        } else {
            return null;
        }
    }
}
