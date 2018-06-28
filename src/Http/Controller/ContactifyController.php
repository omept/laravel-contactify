<?php

namespace Onwuasoanya\Contactify\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactifyController extends Controller
{
    public function postContact(Request $request)
    {
        dd($request->all());
    }
    //

    public function embed() {
        return view("contactify::embed");
    }
}
