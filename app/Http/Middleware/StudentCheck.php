<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;

class StudentCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user()->id;
        $role = Role::where('user_id', $user)->get();

        if($role[0]['role'] === 'student'){
            return $next($request);
        } else if ($role[0]['role'] === 'methodologist') {
            return Redirect::to('/methodologist/sentpetitions');
        } else if ($role[0]['role'] === 'department') {
            return Redirect::to('/department/sentpetitions');
        }
    }
}
