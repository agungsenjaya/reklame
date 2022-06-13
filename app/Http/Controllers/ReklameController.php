<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reklame;
use App\Models\Order;
use Carbon\Carbon;
use DB,Session,Uuid,Validator,Auth,Hash,Str,stdClass,Image,Storage;
use Illuminate\Support\Facades\Http;

class ReklameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::where('status','yes')->count();
        return view('admin.reklame',compact('order'))->with('reklame', Reklame::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reklame_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $no = 0;
        $valid = Validator::make($request->all(), [
            'judul' => 'required',
            'tipe' => 'required',
            'arah' => 'required',
            'kategori' => 'required',
            'foto' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Data gagal dimasukan');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{ 

                if($request->hasfile('foto')) {
                    foreach($request->file('foto') as $file)
                    {
                        $imageName = $no++ . time().'.'. $file->getClientOriginalExtension();
                        $vale = $file->storeAs('upload/reklame', $imageName, 'public');
                        $foto = new stdClass();
                        $foto->id = Str::random(4);
                        $foto->url = '/storage/'.$vale;
                        $after[] = $foto;
                    }
                }
            
            $alamat = new stdClass();
            $alamat->lng = $request->lng;
            $alamat->lat = $request->lat;
            
            $ukuran = new stdClass();
            $ukuran->panjang = $request->panjang;
            $ukuran->tinggi = $request->tinggi;
            
            if ($request->alamat) {
                $alamat->alamat = $request->alamat;
            }else{
                $lat = $request->lat;
                $lng = $request->lng;
                $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lng."&key=AIzaSyAdfB-1tzijt8NQRVY6SLNft9_JwxWxu1s";
                $response = Http::get($url);
                $res = $response->json();
                $alamat->alamat = $res['results'][0]['formatted_address'];
            }
            
            $data = Reklame::create([
                'user_id' => Auth::user()->id,
                'judul' => $request->judul,
                'ukuran' => json_encode($ukuran),
                'tipe' => $request->tipe,
                'arah' => $request->arah,
                'kategori' => $request->kategori,
                'content' => $request->content,
                'foto' => json_encode($after),
                'alamat' => json_encode($alamat),
                'slug' => Str::slug($request->judul),
            ]);
            if ($data) {
                Session::flash('success','Data berhasil masukan');
                return redirect()->route('reklame.index');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Reklame::find($id);
        return view('admin.reklame_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Reklame::find($id);
        $valid = Validator::make($request->all(), [
            'judul' => 'required',
            'tipe' => 'required',
            'arah' => 'required',
            'kategori' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Data gagal dimasukan');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{ 

            $alamat = new stdClass();
            $alamat->lng = $request->lng;
            $alamat->lat = $request->lat;
            
            $ukuran = new stdClass();
            $ukuran->panjang = $request->panjang;
            $ukuran->tinggi = $request->tinggi;

            $data->judul = $request->judul;
            $data->ukuran = json_encode($ukuran);
            $data->tipe = $request->tipe;
            $data->arah = $request->arah;
            $data->kategori = $request->kategori;
            $data->content = $request->content;
            if ($request->alamat) {
                $alamat->alamat = $request->alamat;
            }else{
                $lat = $request->lat;
                $lng = $request->lng;
                $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lng."&key=AIzaSyAdfB-1tzijt8NQRVY6SLNft9_JwxWxu1s";
                $response = Http::get($url);
                $res = $response->json();
                $alamat->alamat = $res['results'][0]['formatted_address'];
            }
            $data->slug = Str::slug($request->judul);
            $data->save();
            if ($data) {
                Session::flash('success','Data berhasil masukan');
                return redirect()->route('reklame.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
