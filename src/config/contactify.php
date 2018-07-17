<?php

return [
    "form-action" => "postContact",
    //can either be get or post
    "form-method" => "post",
    "successful_session_flash_key" => "alert-success",
    "successful_contactify_saving_message" => "Message saved successfully",
    "successful_redirect_to" => "/home",
    "failed_session_flash_key" => "alert-error",
    "failed_contactify_saving_message" => "Message saving failed",
    "failed_redirect_to" => "/home",
    "enable_exception_message" => "true", // defaults to false
    "send_as_email" => "false", // defaults to false
    "form_email_recipient" => "george@gmail.com", // defaults to false
];