<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;
use DB,Session,Uuid,Validator,Auth,Hash,Str,stdClass,Image,Storage;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.portofolio')->with('portofolio', Portofolio::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portofolio_create');
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
            'judul' => 'required|unique:portofolios',
            'foto' => 'required|mimes:jpg,bmp,png',
            'content' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Data gagal dimasukan');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{ 
            $img = $request->foto;
            $img_new = time().($img->getClientOriginalName());
            $img->move('img/portofolio', strtolower($img_new));

            $detail=$request->input('content');
            $dom = new \DomDocument();
            @$dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
            $images = $dom->getElementsByTagName('img');
            foreach($images as $k => $img){
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name= "/img/portofolio/" . time().$k.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
            $detail = $dom->saveHTML();

            $data = Portofolio::create([
                'user_id' => Auth::user()->id,
                'judul' => strtolower($request->judul),
                'content' => $detail,
                'foto' => 'img/portofolio/' . strtolower($img_new),
                'slug' => Str::slug(strtolower($request->judul))
            ]);
            if ($data) {
                Session::flash('success','Data berhasil dimasukan kedalam database');
                return redirect()->route('portofolio.index');
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
        $data = Portofolio::find($id);
        return view('admin.portofolio_edit',compact('data'));
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
        $data = Portofolio::find($id);
        $valid = Validator::make($request->all(),[
            'judul' => 'required',
            'content' => 'required',
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
                $img->move('img/portofolio', strtolower($img_new));
                $data->foto = 'img/portofolio/' . strtolower($img_new);
            }


            $detail=$request->input('content');
            $dom = new \DomDocument();
            // libxml_use_internal_errors(true);
            @$dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');
            foreach($images as $k => $img){
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);
                dd($img->getAttribute('src'));
                // $data = base64_decode($data);
                // $image_name= "/img/portofolio/" . time().$k.'.png';
                // $path = public_path() . $image_name;
                // file_put_contents($path, $data);
                // $img->removeAttribute('src');
                // $img->setAttribute('src', $image_name);
            }
            // $detail = $dom->saveHTML();

            // $data->judul = strtolower($request->judul);
            // $data->content = $detail;
            // $data->slug = Str::slug(strtolower($request->judul));
            // $data->save();

            // if ($data) {
            //     Session::flash('success','Data berhasil diupdate kedalam database');
            //     return redirect()->route('portofolio.index');
            // }
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
