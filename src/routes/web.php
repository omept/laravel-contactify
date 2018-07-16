<?php

Route::group(['namespace' => 'Onwuasoanya\Contactify\Http\Controllers'], function () {
    $contactify_url = "contactify";

    Route::get("$contactify_url", "ContactifyController@embed");

    Route::post('/postContact', "ContactifyController@postContact")->name("contactify_post");
});
?>