<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed'
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès !');
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de la création du compte.')->withInput();
        } catch (\Throwable $e) {
            return back()->with('error', 'Une erreur est survenue lors de la création du compte.')->withInput();
        }

    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function showForgotPassword() {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'name' => 'required|string|exists:users,name'
        ]);

        $user = User::where('email', $request->email)
            ->where('name', $request->name)
            ->first();

        if (!$user) {
            return back()->with('error', 'Aucun utilisateur trouvé avec ces informations.');
        }

        // Générer un nouveau token de réinitialisation
        $token = Str::random(64);

        // Sauvegarder le token dans la base de données
        PasswordReset::create([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        // Envoyer l'email de réinitialisation
        Mail::to($request->email)->send(new PasswordResetMail($token));

        return back()->with('success', 'Un lien de réinitialisation a été envoyé à votre email.');
    }
}
