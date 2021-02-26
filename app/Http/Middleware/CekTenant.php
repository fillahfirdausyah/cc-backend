<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tenant;

class CekTenant
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
        $tenant = Tenant::where('user_id', Auth::id())->first();

        if($tenant->count() > 0 && $tenant->verificated == 'yes'){
            return $next($request);
        }else if($tenant->count() > 0 && $tenant->verificated == NULL) {
            return redirect('/tenant/register')->with('status', 'silahkan tunggu verifikasi dari Admin terlebih dahulu');    
        }

        return redirect('/tenant/register');
    }
}
