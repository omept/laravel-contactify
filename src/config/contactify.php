<?php

/**
 * This file is part of Contactify,
 * a feedback management solution for Laravel.
 *
 * @license MIT
 * @package Onwuasoanya\Contactify
 */


// Warning !!!! Don't add   'message' to your fields to show in email (fields_to_show_in_email), it wont' show. 😂
return [

    "form-action" => "postContact",

    "form-method" => "post",  //can either be get or post
    "form-title" => "QA Feedback Form",
    "font-awesome-icon" => "fa-bomb",
    "fields-to-show-in-form" => [
        'email', //
        'mobile',
        'subject',
        'name',
        'message_body',
    ],
    "required-fields-to-show-in-form" => [
        'email',
        'message_body',
    ],

    // session and redirects
    "successful_session_flash_key" => "alert-success",
    "successful_contactify_saving_message" => "Message saved successfully",
    "successful_redirect_to" => "/home",
    "failed_session_flash_key" => "alert-error",
    "failed_contactify_saving_message" => "Message saving failed",
    "failed_redirect_to" => "/home",

    // debugging
    "enable_exception_message" => "true", // defaults to false

    // email
    "send_as_email" => "false", // defaults to false
    "message_length" => "200", // defaults to false
    "email_heading" => "Contact us form", // for email
    "email_sub_heading" => "New entry for form", // for email
    "admin_email_recipient" => "foo@bar.com", // defaults to false
    "email_view_template" => "contactify::contactify.email",
    "fields_to_show_in_email" => [
        'email', //
        'mobile',
        'subject',
        'name',
        'message_body',
    ],
    'extra_fields' => [
        // "key_index" (no space)
    ]


];