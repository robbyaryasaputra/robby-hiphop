<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pegawai - Profil</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2em; }
        .container { max-width: 600px; margin: auto; background: #f9f9f9; padding: 2em; border-radius: 8px; }
        h1 { color: #c0392b; }
        ul { padding-left: 1.5em; }
        .message { margin-top: 1em; font-weight: bold; color: #2980b9; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Profil Pegawai</h1>
        <p><strong>Nama:</strong> {{ $name }}</p>
        <p><strong>Umur:</strong> {{ $my_age }} tahun</p>
        <p><strong>Hobi:</strong></p>
        <ul>
            @foreach ($hobbies as $hobi)
                <li>{{ $hobi }}</li>
            @endforeach
        </ul>
        <p><strong>Tanggal Harus Wisuda:</strong> {{ $tgl_harus_wisuda }}</p>
        <p><strong>Jarak hari ke wisuda:</strong> {{ $time_to_study_left }} hari</p>
        <p><strong>Semester saat ini:</strong> {{ $current_semester }}</p>
        <p><strong>Cita-cita:</strong> {{ $future_goal }}</p>
        <div class="message">{{ $message }}</div>
    </div>
</body>
</html>
