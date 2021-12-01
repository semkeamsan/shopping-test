<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Permissions
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
        $prefix = 'admin';
        $routeName =  Route::currentRouteName();
        $routes =  collect(explode('.', $routeName));
        config()->set('page.prefix', $prefix);
        config()->set('page.slug', $routes[1]);
        config()->set('page.route', $routes->last());
        request()->merge(['locale' => app()->getLocale()]);


        $permission =  auth()->user()->role->permissions->where('slug', $routes[1])->first();
        $breadcrumbs = collect([
            [
                'title'  => __('Dashboard'),
                'link'   => null,
            ]
        ]);
        config()->set('page.permissions', collect());

        if ($routes['1'] == 'index' || $routes['1'] == 'dashboard') {
            return $next($request);
        }

        if ($permission) {
            config()->set('page.permissions', $permission->routes);
            $breadcrumbs = collect([
                [
                    'title'  => $permission->translation()->name,
                    'link'   => route($prefix . '.' . $permission->slug . '.index'),
                ]
            ]);
            $route = $routes->last();
            if ($route == 'create' || $route == 'store') {
                $route = 'create-store';
            } elseif ($route == 'edit' || $route == 'update') {
                $route = 'edit-update';
            }
            if ($permission->routes->contains($route)) {
                if ($routes->last() != 'index') {
                    $breadcrumbs->add([
                        'title'  => __(Str::title($routes->last())),
                        'link'   => null,
                    ]);
                }
                config()->set('page.breadcrumbs', $breadcrumbs);
                return $next($request);
            }
        }
        return abort(403);
    }
}
