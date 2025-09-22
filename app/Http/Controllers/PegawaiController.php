<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        // Example data (customize as needed)
        $name = 'Robby HipHop';
        $birthdate = '2003-05-10';
        $hobbies = ['Ngoding', 'Futsal', 'Mendengarkan Musik', 'Makan', 'Traveling'];
        $tgl_harus_wisuda = '2026-08-15';
        $current_semester = 4;
        $future_goal = 'Menjadi Software Engineer di perusahaan besar';

        // Calculate age
        $my_age = \Carbon\Carbon::parse($birthdate)->age;
        // Calculate days left to graduation
        $today = \Carbon\Carbon::now();
        $wisuda = \Carbon\Carbon::parse($tgl_harus_wisuda);
        $time_to_study_left = $today->diffInDays($wisuda, false);

        // Conditional message
        $message = $current_semester < 3
            ? 'Masih Awal, Kejar TAK'
            : 'Jangan main-main, kurang-kurangi main game!';

        return view('pegawai-index', [
            'name' => $name,
            'my_age' => $my_age,
            'hobbies' => $hobbies,
            'tgl_harus_wisuda' => $tgl_harus_wisuda,
            'time_to_study_left' => $time_to_study_left,
            'current_semester' => $current_semester,
            'future_goal' => $future_goal,
            'message' => $message,
        ]);
    }
}
