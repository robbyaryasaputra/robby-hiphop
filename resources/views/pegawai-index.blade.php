<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pegawai - Profil</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Montserrat', Arial, sans-serif;
            margin: 0;
            background: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
            min-height: 100vh;
        }
        .container {
            max-width: 500px;
            margin: 3em auto;
            background: #fff;
            padding: 2.5em 2em 2em 2em;
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
            border: 1px solid #f6d365;
        }
        h1 {
            color: #c0392b;
            text-align: center;
            margin-bottom: 1.5em;
            letter-spacing: 1px;
        }
        .profile-row {
            display: flex;
            align-items: center;
            margin-bottom: 1em;
        }
        .profile-row i {
            color: #fda085;
            margin-right: 0.7em;
            font-size: 1.2em;
            width: 1.5em;
            text-align: center;
        }
        .profile-label {
            font-weight: 700;
            min-width: 120px;
        }
        ul {
            padding-left: 2.2em;
            margin-top: 0.2em;
            margin-bottom: 1em;
        }
        ul li {
            margin-bottom: 0.3em;
        }
        .message {
            margin-top: 1.5em;
            font-weight: bold;
            color: #fff;
            background: #2980b9;
            padding: 0.8em 1em;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(41,128,185,0.08);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fa-solid fa-id-card"></i> Profil Pegawai</h1>
        <div class="profile-row"><i class="fa-solid fa-user"></i> <span class="profile-label">Nama:</span> {{ $name }}</div>
        <div class="profile-row"><i class="fa-solid fa-cake-candles"></i> <span class="profile-label">Umur:</span> {{ $my_age }} tahun</div>
        <div class="profile-row"><i class="fa-solid fa-heart"></i> <span class="profile-label">Hobi:</span></div>
        <ul>
            @foreach ($hobbies as $hobi)
                <li><i class="fa-solid fa-check"></i> {{ $hobi }}</li>
            @endforeach
        </ul>
        <div class="profile-row"><i class="fa-solid fa-calendar-days"></i> <span class="profile-label">Tgl Wisuda:</span> {{ $tgl_harus_wisuda }}</div>
        <div class="profile-row"><i class="fa-solid fa-hourglass-half"></i> <span class="profile-label">Jarak ke Wisuda:</span> {{ $time_to_study_left }} hari</div>
        <div class="profile-row"><i class="fa-solid fa-graduation-cap"></i> <span class="profile-label">Semester:</span> {{ $current_semester }}</div>
        <div class="profile-row"><i class="fa-solid fa-bullseye"></i> <span class="profile-label">Cita-cita:</span> {{ $future_goal }}</div>
        <div class="message">{{ $message }}</div>
    </div>
</body>
</html>
