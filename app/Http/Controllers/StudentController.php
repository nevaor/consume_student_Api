<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Libraries\BaseApi;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //mengambil data dari input search;
        $search = $request->search;
        //memanggil libraries Base Api method nya index dengan mengirim parameter 
        //berupa path data dari Api nya, parameter2 data untuk mengisi search_nama Api nya
        $data =(new BaseApi)->index('/students', ['search_nama' => $search]);
        // ambil response json
        $students = $data->json();
        //dd($students);
        //kirim hasil pengambilan data ke blade index 
        //ambil property data dari response json 
        return view('index')->with(['students' => $students['data']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
