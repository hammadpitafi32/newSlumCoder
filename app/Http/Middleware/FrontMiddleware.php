<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\PostCategory;
use View;

class FrontMiddleware
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

        $cat=PostCategory::all();
        View::share('category',$cat);
        return $next($request);
    }
}
