<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function successDaftar()
    {
        $noPendaftaran = session()->get('no_pendaftaran');

        if (!$noPendaftaran) {
            return redirect('check-status');
        }

        return view('success-daftar', [
            'no_pendaftaran' => $noPendaftaran
        ]);
    }

    public function checkStatus()
    {
        $noPendaftaran = session()->get('no_pendaftaran');

        if ($noPendaftaran) {
            return redirect('success-daftar');
        }

        return view('check-status');
    }
}
