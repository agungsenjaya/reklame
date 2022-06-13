<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Carbon\Carbon;
use DB,Session,Uuid,Validator,Auth,Hash,Str,stdClass,Image,Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brand')->with('brand', Brand::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand_create');
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
            'judul' => 'required|unique:brands',
            'foto' => 'required|mimes:jpg,bmp,png',
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Data gagal dimasukan');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{ 
            $img = $request->foto;
            $img_new = time().($img->getClientOriginalName());
            $img->move('img/brand', strtolower($img_new));

            $data = Brand::create([
                'user_id' => Auth::user()->id,
                'judul' => strtolower($request->judul),
                'foto' => 'img/brand/' . strtolower($img_new),
                'slug' => Str::slug(strtolower($request->judul))
            ]);
            if ($data) {
                Session::flash('success','Data berhasil dimasukan kedalam database');
                return redirect()->route('brand.index');
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
        $data = Brand::find($id);
        return view('admin.brand_edit',compact('data'));
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
        $data = Brand::find($id);
        $valid = Validator::make($request->all(),[
            'judul' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Terjadi kesalahan saat memasukan data');
            return redirect()->back()
                        ->withErrors($valid)
                        ->withInput();
        }else{
            
            if ($request->hasFile('foto')) {
                $img = $request->foto;
                $img_new = time(). $img->getClientOriginalName();
                $img->move('img/brand', strtolower($img_new));
                $data->foto = 'img/brand/' . strtolower($img_new);
            }

            $data->judul = strtolower($request->judul);
            $data->slug = Str::slug(strtolower($request->judul));
            $data->save();

            if ($data) {
                Session::flash('success','Data berhasil diupdate kedalam database');
                return redirect()->route('brand.index');
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
