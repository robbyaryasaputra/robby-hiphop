@extends('layouts.admin.app') @section('content')
<div class="py-4">
    <h1>Edit User</h1>
</div>

<div class="card border-0 shadow components-section">
    <div class="card-body">
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-4">
                <div class="col-lg-6 col-sm-6">

                    <div class="mb-3">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="password">Password (Kosongkan jika tidak ingin mengganti)</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>

                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Foto Profil</label>

                        @if($user->profile_picture)
                            <div class="mb-2">
                                <img src="{{ Storage::url($user->profile_picture) }}" alt="Preview" class="img-thumbnail" style="max-height: 150px;">
                            </div>
                        @endif

                        <input class="form-control" type="file" id="profile_picture" name="profile_picture">
                        <div class="form-text text-muted">Format: jpg, png, jpeg. Maks: 2MB.</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update User</button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
