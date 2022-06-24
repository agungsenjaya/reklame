<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reklame;
use App\Models\Contact;
use App\Models\Brand;
use App\Models\Portofolio;
use DB,Session,Uuid,Validator,Auth,Hash,Str,stdClass,Image,Storage, Mail;

class ClientController extends Controller
{
    
    public function home() {
        return view('client.home')->with('reklame', Reklame::all())->with('brand', Brand::all());
    }
    
    public function about() {
        return view('client.about');
    }
    
    public function reklame() {
        return view('client.reklame')->with('reklame', Reklame::all());
    }
    
    public function reklame_view($id) {
        $data = Reklame::where('slug', $id)->first();
        return view('client.reklame_view',compact('data'))->with('reklame', Reklame::all());
    }
    
    public function contact() {
        return view('client.contact');
    }
    
    public function contact_send(Request $request) {
        $valid = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
            'g-recaptcha-response' => 'recaptcha',
        ]);
        if ($valid->fails()) {
            Session::flash('notsend', 'Data gagal dimasukan');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{ 

            $data = array(
                'nama' => $request->nama, 
                'email' => $request->email, 
                'pesan' => $request->pesan,
            );
            
            $send = Contact::create([
                'nama' => $data['nama'],
                'email' => $data['email'],
                'pesan' => $data['pesan'],
            ]);

            if ($send) {
                Mail::send('email.contact', ['data' => $data], function($mail) use($data) {
                    $mail->from($data['email'], $data['nama']);
                    // $mail->to('mediaapersada@gmail.com', 'Mediaapersada');
                    $mail->to('agungsenjaya813@gmail.com', 'Mediaapersada');
                    $mail->subject('Customer Website'. ucwords($data['nama']));
                });
            }
            Session::flash('send', 'Berhasil mengirim pesan..');
            return redirect()->back();
        }
    }

    public function brand() {
        return view('client.brand')->with('brand', Brand::all());
    }

    public function portofolio() {
        return view('client.portofolio')->with('portofolio', Portofolio::all());
    }
    
    public function portofolio_view($id) {
        $data = Portofolio::where('slug', $id)->first();
        return view('client.portofolio_view',compact('data'))->with('portofolio', Portofolio::all());
    }

}
