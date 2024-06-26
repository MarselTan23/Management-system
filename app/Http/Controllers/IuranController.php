<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class IuranController extends Controller
{

    public function index()
    {
        $title="Setting Kas";
        $kas=Iuran::first();

        return view('setting.iurankas',compact('title','kas'));
    }

    public function ubah_nominalkas(Request $request)
    {
        $data=Iuran::find($request->id);
        $nominal=str_replace('.','',$request->nominal);
        $data->nominal=$nominal;
        $data->save();
        Alert::success('Berhasil', 'Berhasil ubah nominal kas');
        return redirect()->route('iuran');
       
    }
}
