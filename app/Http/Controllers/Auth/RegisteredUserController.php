<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $input = trim($request->input('name', ''));

        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $email = $input;
            $name = strstr($input, '@', true) ?: $input;
        } else {
            $name = $input;
            $email = strtolower(preg_replace('/[^a-zA-Z0-9_\-\.]/', '', $input)) . '@imamsyaukani.com';
        }

        $request->merge([
            'derived_email' => $email,
        ]);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'derived_email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class . ',email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'name.required' => 'Username atau email wajib diisi.',
            'derived_email.unique' => 'Username atau email ini sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
        ]);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/admin/dashboard');
    }
}
