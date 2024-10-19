<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;
use App\Models\Role;

class MethodologistCheck
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

        if($role[0]['role'] === 'methodologist'){
            return $next($request);
        } else if ($role[0]['role'] === 'student') {
            return Redirect::to('/student/mypetitions');
        } else if ($role[0]['role'] === 'department') {
            return Redirect::to('/department/sentpetitions');
        }
    }
}
