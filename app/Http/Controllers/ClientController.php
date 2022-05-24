<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reklame;

class ClientController extends Controller
{
    
    public function home() {
        return view('client.home');
    }
    
    public function about() {
        return view('client.home');
    }
    
    public function reklame() {
        return view('client.home')->with('reklame', Reklame::all());
    }
    
    public function reklame_view($id) {
        $data = Reklame::find('slug', $id)->first();
        return view('client.home',compact('data'));
    }
    
    public function contact() {
        // 
    }
    
    public function contact_send(Request $request) {
        // 
    }

}
