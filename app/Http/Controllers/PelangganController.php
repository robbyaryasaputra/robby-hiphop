<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\PelangganFile;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = ['gender'];
        $searchableColumns = ['first_name', 'last_name', 'email', 'phone'];

        $data['dataPelanggan'] = Pelanggan::with('files') // Eager load files
            ->filter($request, $filterableColumns)
            ->search($request, $searchableColumns)
            ->paginate(10)
            ->withQueryString();

        return view('admin.pelanggan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // 1. Validasi
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'birthday' => 'required',
        'gender' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
        'company' => 'required',
        // Validasi array file (perhatikan tanda .*)
        'file.*' => 'mimes:png,jpg,jpeg,pdf,doc,docx|max:2048', 
    ]);

    // 2. Simpan Data Pelanggan
    $data['first_name'] = $request->first_name;
    $data['last_name'] = $request->last_name;
    $data['birthday'] = $request->birthday;
    $data['gender'] = $request->gender;
    $data['email'] = $request->email;
    $data['phone'] = $request->phone;
    $data['address'] = $request->address;
    $data['company'] = $request->company;

    // Simpan pelanggan ke database dan tampung ke variabel $pelanggan
    $pelanggan = Pelanggan::create($data);

    // 3. Proses Multiple Upload (Looping)
    if ($request->hasFile('file')) {
        // Kita lakukan foreach karena file yang dikirim sekarang bentuknya array
        foreach ($request->file('file') as $uploadedFile) {
            
            // Generate nama unik
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $uploadedFile->getClientOriginalName());
            
            // Pindahkan file ke folder public
            $uploadedFile->move(public_path('uploads/pelanggan'), $filename);

            // Simpan ke tabel pelanggan_files
            PelangganFile::create([
                'pelanggan_id' => $pelanggan->pelanggan_id, // Ambil ID pelanggan yang baru dibuat
                'file' => $filename // Sesuai nama kolom di database Anda
            ]);
        }
    }

    return redirect()->route('pelanggan.index')->with('success', 'Penambahan Data Berhasil');
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
