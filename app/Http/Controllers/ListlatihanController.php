<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\ListLatihan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ListlatihanController extends Controller
{
    public function index()
    {
        $title="List Latihan";
              // Mendapatkan tanggal hari ini menggunakan Carbon
              $today = Carbon::today()->toDateString();

              // Menghitung jumlah anggota yang hadir pada tanggal hari ini
              $jumlahAnggotaHariIni = ListLatihan::whereDate('tanggal', $today)->count();
      
              // Mengembalikan view dengan data jumlah anggota
              return view('latihan.index', compact('jumlahAnggotaHariIni', 'title'));
    }
    public function detail_listlatihandaridashboard(){
        $title="Anggota Yang Ikut Latihan";
        $today = Carbon::today()->toDateString();

        // Mengambil data anggota yang memiliki latihan hari ini
        $anggota = Anggota::whereHas('listLatihan', function($query) use ($today) {
            $query->whereDate('tanggal', $today);
        })->with(['jurusan.fakultas', 'listLatihan'])->get();

        return view('latihan.detail_peserta', compact('anggota', 'title'));
    }

    public function create(){
        $today = Carbon::today()->toDateString();
$title="List Latihan";
        // Mengambil semua anggota yang tidak memiliki entri di ListLatihan dengan tanggal hari ini
        $anggota = Anggota::with('user','jurusan.fakultas')->whereDoesntHave('listLatihan', function ($query) use ($today) {
            $query->whereDate('tanggal', $today);
        })->get();
return view('latihan.tambah_list',compact('anggota','title'));
    }

    public function store(Request $request){
        $today = Carbon::today()->toDateString();

        // Memeriksa apakah ada anggota yang dipilih
        if ($request->has('anggota_ids')) {
            // Menyimpan setiap anggota yang dipilih ke dalam tabel list_latihans
            foreach ($request->anggota_ids as $anggota_id) {
                // Cek jika anggota sudah terdaftar untuk hari ini
                $existingEntry = ListLatihan::where('id_anggota', $anggota_id)
                                            ->whereDate('tanggal', $today)
                                            ->first();

                // Hanya tambahkan jika tidak ada entri sebelumnya untuk hari ini
                if (!$existingEntry) {
                    ListLatihan::create([
                        'id_anggota' => $anggota_id,
                        'tanggal' => $today,
                    ]);
                }
            }

            // Redirect atau berikan response sukses
            Alert::success('Berhasil', 'Berhasil tambah data list latihan');
            return redirect()->route('listlatihan');
        }else {
         Alert::error('Gagal', 'Tidak ada anggota yang dipilih');
            return redirect()->back();   
        }
    }
    public function destroy($id){
        $data=ListLatihan::find($id);
        $data->delete();
        Alert::success('Berhasil', 'Berhasil hapus data list latihan');
        return redirect()->route('listlatihan');
    }
    public function anggota_yangikutlatihan(){
        $title="Anggota Yang Ikut Latihan";
        $today = Carbon::today()->toDateString();

        // Mengambil data anggota yang memiliki latihan hari ini
        $anggota = Anggota::whereHas('listLatihan', function($query) use ($today) {
            $query->whereDate('tanggal', $today);
        })->with(['jurusan.fakultas', 'listLatihan'])->get();

        return view('latihan.list_anggotadetail', compact('anggota', 'title'));
    }
}
