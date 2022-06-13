<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reklame;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Contact;
use Carbon\Carbon;
use DB,Session,Uuid,Validator,Auth,Hash,Str,stdClass,Image,Storage;

class AdminController extends Controller
{
    
    public function index() {
        $reklame = Reklame::count();
        $order = Order::where('status','yes')->count();
        $ord = Order::where('status','yes')->get();
        return view('admin.home',compact('reklame','order','ord'))->with('contact', Contact::all());
        
    }

    public function contact() {
        return view('admin.contact')->with('contact', Contact::all());
    }

}
