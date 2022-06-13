<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use DB,Session,Uuid,Validator,Auth,Hash,Str,stdClass,Image,Storage;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.order')->with('order', Order::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Data gagal dimasukan');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{ 
            $data = Order::create([
                'reklame_id' => $request->reklame_id,
                'user_id' => Auth::user()->id,
                'kode' => Str::random(),
                'status' => 'yes',
                'nama' => $request->nama,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'nama' => $request->nama,
                'email' => ($request->email) ? $request->email : NULL,
                'phone' => ($request->phone) ? $request->phone : NULL,
                'biaya' => ($request->biaya) ? $request->biaya : NULL,
            ]);
            if ($data) {
                Session::flash('success','Data berhasil masukan');
                return redirect()->back();
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
        $data = Order::find($id);
        $data->status = $request->status;
        $data->save();
        if ($data) {
            Session::flash('success','Data berhasil masukan');
            return redirect()->back();
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
