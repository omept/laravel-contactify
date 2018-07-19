<?php

/**
 * This file is part of Contactify,
 * a feedback management solution for Laravel.
 *
 * @license MIT
 * @package Onwuasoanya\contactify
 */

Route::group(['namespace' => 'Onwuasoanya\Contactify\Http\Controllers', 'middleware' => ['web']], function () {
    $contactify_url = "contactify";

    Route::get("$contactify_url", "ContactifyController@embed");

    Route::post('/postContact', "ContactifyController@postContact")->name("contactify_post");
});
?>