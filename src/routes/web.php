<?php

$contactify_url = "contactify";
Route::get("$contactify_url", function () {
    return view("contactify::embed");
});


?>