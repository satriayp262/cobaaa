<?php
 
namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class MahasiswaController extends Controller
{
    public function index(){
    	$data = mahasiswa::orderby('nama', 'asc')->get();
        return view('mahasiswa.index')->with('data', $data);
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        FacadesSession::flash('nama', $request->nama);
        FacadesSession::flash('nim', $request->nim);
        FacadesSession::flash('alamat', $request->alamat);

        $request->validate([
            'nama' => 'required',
            'nim' => 'required|numeric|unique:mahasiswa,nim',
            'alamat' => 'required'
        ], [
            'nama.required' => 'Nama wajib diisi!',
            'nim.required' => 'NIM wajib diisi!',
            'nim.numeric' => 'NIM hanya angka!',
            'nim.unique' => 'NIM yang diisikan sudah ada!',
            'alamat.required' => 'alamat wajib diisi!',
        ]);

        $data = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'alamat' => $request->alamat,
        ];
        mahasiswa::create($data);

        return redirect()->to('mahasiswa')->with('success', 'Berhasil menambahkan data!');;
    }

    public function edit(string $id)
    {
        $data = mahasiswa::where('nim', $id)->first();
        return view('mahasiswa.edit')->with('data', $data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required'
        ], [
            'nama.required' => 'Nama wajib diisi!',
            'alamat.required' => 'Jurusan wajib diisi!',
        ]);

        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ];
        mahasiswa::where('nim', $id)->update($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil mengedit data!');;
    }

    public function destroy(string $id)
    {
        mahasiswa::where('nim', $id)->delete();
        return redirect()->to('mahasiswa')->with('success','Berhasil menghapus data!');
    }
}