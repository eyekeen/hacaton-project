<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Models\Role;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = auth()->user()->id;
        $role = Role::where('user_id', $user)->get();
        $role = $role[0]['role'];

        if($role === 'student'){
            return redirect()->intended(route('student.mypetitions', absolute: false));
        } else if ($role === 'dean'){
            return redirect()->intended(route('dean.sentpetitions', absolute: false));
        } else if ($role === 'department') {
            return redirect()->intended(route('department.sentpetitions', absolute: false));
        } else if ($role === 'methodologist') {
            return redirect()->intended(route('methodologist.sentpetitions', absolute: false));
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
