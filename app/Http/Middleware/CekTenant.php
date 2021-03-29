<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
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

        if($tenant != NULL && $tenant->verified == 'yes'){
            return $next($request);
        }else if($tenant != NULL && $tenant->verified == NULL) {
            return response()->view('showroom2.tenant.tenant-register', ['tenant' => $tenant, 'status' => 'Silahkan tunggu verifikasi dari Admin terlebih dahulu']);    
        }

        return redirect('/tenant/register');
    }
}
