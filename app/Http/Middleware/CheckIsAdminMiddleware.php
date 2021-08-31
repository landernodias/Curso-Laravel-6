<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        //if($user->email != 'marcelino98@example.net') {
        if(!in_array($user->email, ['nelcionedias@gmail.com',
                                    'theresia61@example.com',
                                    'ihuels@example.net',
                                    'stark.chandler@example.net'])){
            return redirect('/');
        }
        //dd('Entrou no middleware');
        return $next($request);
    }
}
