<?php
use \Illuminate\Http\Request;


$contactify_url = "contactify";

Route::get("$contactify_url", function () {
    return view("contactify::embed");
});

Route::post('/test', function (Request $request) {
    dd($request->all());
})->name("contactify_post");

?>