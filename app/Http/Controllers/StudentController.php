<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Libraries\BaseApi;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $data = (new BaseApi)->index('/api/students', ['search_nama' => $search]);
        $students = $data->json();
        // dd($students);
        return view('index')->with(['students' => $students['data']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
        ];
        $proses = (new BaseApi)->store('/api/students/tambah-data', $data);
        if ($proses->failed()) {
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            return redirect('/')->with('success', 'Berhasil menambahkan data baru ke students API');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // proses ambil data api ke route REST API /students/{id}
        $data = (new BaseApi)->edit('/api/students/'.$id);
        if ($data->failed()) {
            // kalau gagal proses $data diatas, ambil deskripsi err dari json property data
            $errors = $data->json('data');
            // balikin ke halaman awal, sama errors nya
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            // kalau berhasil, ambil data dari jsonnya
            $student = $data->json('data');
            // alihin ke blade edit dengan mengirim data $student diatas agar bisa digunakan pada blade
            return view('edit')->with(['student' => $student]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // data yang akan dikirim ($request ke REST APInya)
        $payload = [
            'nama' => $request->nama,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
        ];
        // panggil method update dari BaseApi, kirim endpoint (route update dari REST APInya) dan data ($payload diatas)
        $proses = (new BaseApi)->update('/api/students/update/'.$id, $payload);
        if ($proses->failed()) {
            // kalau gagal, balikin lagi sama pesan errors dari json nya
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            // berhasil, balikin ke halaman paling awal dengan pesan
            return redirect('/')->with('success', 'Berhasil mengubah data siswa dari API');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proses = (new BaseApi)->delete('/api/students/delete/'.$id);

        if ($proses->failed()) {
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            return redirect('/')->with('success', 'Berhasil hapus data sementara dari API');
        }
    }

    public function trash()
    {
        $proses = (new BaseApi)->trash
        ('/api/students/show/trash');
        if ($proses->failed()) {
            $errors =$proses->json
            ('data');
            return redirect()->back()
            ->with(['errors'=>
            $errors]);
        }else{
            $studentsTrash = 
            $proses->json('data');
            return view('trash')->with(['studentsTrash'=>$studentsTrash]);
        }
    }

    public function permanent($id)
    {
        $proses = (new BaseApi)->permanent('/api/students/trash/delete/permanent/'. $id);
        if($proses ->failed()) {
            $errors = $proses->json('data');
            return redirect()->back()->with(['erors' => $errors]);
        }else{
            return redirect()->back()->with('succes', 'berhasil menghapus data secara permanent');
        }
    }

    public function restore($id)
    {
        $proses = (new BaseApi)->restore('api/students/trash/restore/'.$id);
        if ($proses->failed()){
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors'=> $errors]);
        }else{
            return redirect('/')->with('succes', 'berhasil mengembalikan data dari sampah!');
        }

    }
}