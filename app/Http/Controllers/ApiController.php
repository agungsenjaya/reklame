<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB,Session,Uuid,Validator,Auth,Hash,Str;

class ApiController extends Controller
{
    public function foto_reklame(Request $request){
        $no = 0;
        if($request->hasfile('foto')) {
                foreach($request->file('foto') as $file)
                {
                    $imageName = $no++ . time().'.'. $file->getClientOriginalExtension();
                    $vale = $file->storeAs('upload/reklame', $imageName, 'public');
                    $after[] = '/storage/'.$vale;
                }
            }
            if ($after) {
                return response()->json([
                    'code' => 200, 
                    'data' => json_encode($after)
                ]);
            }

                // return response()->json([
                //     'code' => 200, 
                //     'data' => 'abc'
                // ]);

    }
    
    public function foto_portofolio(Request $request){
        $no = 0;
        if($request->hasfile('foto')) {
                foreach($request->file('foto') as $file)
                {
                    $imageName = $no++ . time().'.'. $file->getClientOriginalExtension();
                    $vale = $file->storeAs('upload/reklame', $imageName, 'public');
                    $after[] = '/storage/'.$vale;
                }
            }
            if ($after) {
                return response()->json([
                    'code' => 200, 
                    'data' => json_encode($after)
                ]);
            }

                // return response()->json([
                //     'code' => 200, 
                //     'data' => 'abc'
                // ]);
    }
}
