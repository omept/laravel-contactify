<?php

namespace Onwuasoanya\Contactify\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Onwuasoanya\Contactify\Models\Contactify;

class ContactifyController extends Controller
{
    public function postContact(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        Contactify::create($data);
    }

    //

    public function embed()
    {
        return view("contactify::embed");
    }
}
