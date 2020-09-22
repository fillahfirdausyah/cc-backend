<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use App\Models\Event;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->role == 'admin') {
            $count1 = User::count();
            $count2 = News::count(); 
            $count3 = Event::count();
            return response()->view('admin.Dashboard', compact('count1', 'count2', 'count3'));
        } else {
            return response()->view('member.dashboard');
        }
        return $next($request);
    }
}
