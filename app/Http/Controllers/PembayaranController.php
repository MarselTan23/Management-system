<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\BayarIuran;
use App\Models\Iuran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranController extends Controller
{
    public function index()  {
        $title="Data Pembayaran Kas";
        $data=BayarIuran::with('anggota','iuran')->get();

        return view('pembayaran_kas.index',compact('title','data'));
        
    }
    public function create()  {
        $title="Pembayaran Kas";
        // $data=BayarIuran::with('anggota','iuran')->get();
        $anggota=Anggota::all();
        $iuran=Iuran::first();
        return view('pembayaran_kas.tambah',compact('title','anggota','iuran'));
    }
    
    public function edit($id)  {
        $title=" Edit Pembayaran Kas";
        $data=BayarIuran::with('anggota','iuran')->find($id);
        $anggota=Anggota::all();
        $iuran=Iuran::first();
        return view('pembayaran_kas.edit',compact('title','data','anggota','iuran'));
    }
    public function update(Request $request, $id)  {
        $validator=Validator::make($request->all(),[
            'id_anggota' => 'required|exists:anggota,id',
            'id_iuran' => 'required|exists:iurans,id',
            'nominal' => 'required',
            'bayar' => 'required',
            'selama' => 'required',
            'dari_tanggal' => 'required',
            'sampai_tanggal' => 'required',
            'total_nominal' => 'required',
            // 'bayar' => 'required',
        ]);

        if($validator->fails()){
            Alert::error('Gagal', 'Data gagal di tambahkan'.$validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $bayar=str_replace('.','',$request->bayar);
        $total=str_replace('.','',$request->total_nominal);
$dari_tanggal=Carbon::parse($request->dari_tanggal)->format('Y-m-d');
$sampai_tanggal=Carbon::parse($request->sampai_tanggal)->format('Y-m-d');


        $data=BayarIuran::find($id);
        $data->id_anggota=$request->id_anggota;
        $data->id_iuran=$request->id_iuran;
        $data->nominal=$request->nominal;
        $data->bayar=$bayar;
        $data->selama=$request->selama;
        $data->dari_tanggal=$dari_tanggal;
        $data->sampai_tanggal=$sampai_tanggal;
        $data->total_nominal=$total;
        $data->save();
        Alert::success('Berhasil', 'Berhasil ubah data pembayaran');
        return redirect()->route('pembayaran');
    }

    public function store(Request $request)  {
        $validator=Validator::make($request->all(),[
            'id_anggota' => 'required|exists:anggota,id',
            'id_iuran' => 'required|exists:iurans,id',
            'nominal' => 'required',
            'bayar' => 'required',
            'selama' => 'required',
            'dari_tanggal' => 'required',
            'sampai_tanggal' => 'required',
            'total_nominal' => 'required',
            // 'bayar' => 'required',
        ]);

        if($validator->fails()){
            Alert::error('Gagal', 'Data gagal di tambahkan'.$validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $bayar=str_replace('.','',$request->bayar);
        $total=str_replace('.','',$request->total_nominal);
$dari_tanggal=Carbon::parse($request->dari_tanggal)->format('Y-m-d');
$sampai_tanggal=Carbon::parse($request->sampai_tanggal)->format('Y-m-d');
        $data=BayarIuran::create([
            'id_anggota' => $request->id_anggota,
            'id_iuran' => $request->id_iuran,
            'nominal' => $request->nominal,
            'bayar' => $bayar,
            'selama' => $request->selama,
'dari_tanggal' => $dari_tanggal,
            'sampai_tanggal' => $sampai_tanggal,
            'tanggal_bayar' => Carbon::now()->format('Y-m-d'),
            'total_nominal' => $total,
        ]);
        Alert::success('Berhasil', 'Berhasil tambah data pembayaran kas');
        return redirect()->route('pembayaran');
    }

    public function destroy($id)  {
        $data=BayarIuran::find($id);
        $data->delete();
        Alert::success('Berhasil', 'Berhasil hapus data pembayaran kas');
        return redirect()->route('pembayaran');
    }
}
