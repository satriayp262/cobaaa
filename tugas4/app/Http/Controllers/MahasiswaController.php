<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        // Mendapatkan data dari tabel 'mahasiswa'
        $mahasiswa = DB::table('mahasiswa')->get();

        // Mengirim data mahasiswa ke view
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function tampil()
    {
        $mahasiswa = Mahasiswa::leftJoin('jurusan', 'mahasiswa.kodejur', '=', 'jurusan.kodejur')
            ->select('mahasiswa.nama', 'mahasiswa.nim', 'mahasiswa.ipk', 'jurusan.namajur')
            ->get();

        return view('mahasiswa.tampil', compact('mahasiswa'));
    }
    public function nilai()
    {
        $mahasiswa = Mahasiswa::leftJoin('khs', 'mahasiswa.nim', '=', 'khs.nim')
            ->leftJoin('matkul', 'khs.kodemk', '=', 'matkul.kodemk')
            ->select('mahasiswa.nim', 'mahasiswa.nama', 'matkul.namamk', 'khs.nilai','matkul.sks', 'khs.semester')
            ->get();

        return view('mahasiswa.nilai', compact('mahasiswa'));
    }
}

