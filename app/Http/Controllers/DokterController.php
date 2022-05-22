<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Dokter;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class DokterController extends Controller
{
    public function create()
    {
        return view('auth.login');
    } // end method

    public function index()
    {
        $dokters = Dokter::all();

        return view('pasien.reservasi.index', compact('dokters'))->with('user_type', 'pasien');
    }

    public function dashboard()
    {
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function login(LoginRequest $request)
    {
        $request->authenticateDokter();

        $request->session()->regenerate();

        return redirect()->route('dokter.dashboard');
    }

    public function register(LoginRequest $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => ['required', Rule::in(['L', 'P'])],
            'usia' => ['required', 'numeric', 'min:0'],
        ]);

        $dokter = Dokter::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'usia' => $request->usia,
            'lama_bekerja' => $request->usia,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($dokter));

        $this->login($request);

        return redirect()->route('dokter.dashboard');
    }

    public function destroy()
    {
        Auth::guard('dokter')->logout();
        return redirect()->route('login');
    }
}
