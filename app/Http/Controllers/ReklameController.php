<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reklame;
use Carbon\Carbon;
use Image;
use Storage;
use DB,Session,Uuid,Validator,Auth,Hash,Str;

class ReklameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reklame')->with('reklame', Reklame::all());
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
        $valid = Validator::make($request->all(), [
            'judul' => 'required',
            'ukuran' => 'required',
            'tipe' => 'required',
            'arah' => 'required',
            'kategori' => 'required',
            'status' => 'required',
            'foto' => 'required',
            'biaya' => 'required',
            'alamat' => 'required',
            'longLat' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Data gagal dimasukan');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{ 
                if($request->hasfile('foto'))
                {
                    foreach($request->file('foto') as $file)
                    {
                        $name = time().'.'.$file->extension();
                        $file->move(public_path().'/img/reklame/', $name);  
                        $foto[] = $name;  
                    }
    
            $lng = $request->lng;
            $lat = $request->lat;
            
            $data = Reklame::create([
                'user_id' => Auth::user()->id,
                'judul' => $request->judul,
                'ukuran' => $request->ukuran,
                'tipe' => $request->tipe,
                'arah' => $request->arah,
                'kategori' => $request->kategori,
                'status' => $request->status,
                'biaya' => $request->biaya,
                'foto' => json_encode($foto),
                'alamat' => $request->alamat,
                'longLat' => json_encode(compact("lng", "lat")),
                'slug' => Str::slug($request->judul),
            ]);
            if ($data) {
                Session::flash('success','Data berhasil masukan');
                return redirect()->route('reklame.index');
            }
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
        //
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
            'ukuran' => 'required',
            'tipe' => 'required',
            'arah' => 'required',
            'kategori' => 'required',
            'status' => 'required',
            'biaya' => 'required',
            'alamat' => 'required',
            'longLat' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Data gagal dimasukan');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{ 
            // 
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
