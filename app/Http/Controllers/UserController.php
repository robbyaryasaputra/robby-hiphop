<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Menampilkan daftar user
     */
    public function index()
    {
        // Mengirim variabel $dataUser ke view index
        $dataUser = User::latest()->paginate(10);
        return view('admin.user.index', compact('dataUser'));
    }

    /**
     * Menampilkan form tambah user
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Menyimpan data user baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        // LOGIC UPLOAD FOTO
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_picture'] = $path;
        }

        User::create($data);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit user (BAGIAN YANG ERROR SEBELUMNYA)
     */
    public function edit(string $id)
    {
        // 1. Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // 2. Kirim data $user ke view
        // 'compact' akan membuat variabel $user tersedia di blade
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Mengupdate data user
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Cek update password
        if ($request->filled('password')) {
            $request->validate(['password' => 'min:8|confirmed']);
            $data['password'] = Hash::make($request->password);
        }

        // LOGIC UPDATE FOTO
        if ($request->hasFile('profile_picture')) {
            // Hapus foto lama
            if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Upload foto baru
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_picture'] = $path;
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User berhasil diupdate!');
    }

    /**
     * Menghapus data user
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Hapus file foto jika ada
        if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}
