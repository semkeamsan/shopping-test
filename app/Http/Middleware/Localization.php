<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
class Localization
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
        $languages  = explode(',', $request->server('HTTP_ACCEPT_LANGUAGE'));

        $locale    = array();
        foreach ($languages  as $lang) {
            $locale[] = substr($lang, 0, 2);
        }
        if (session('locale')) {
            App::setLocale(session('locale'));
        } else {
            if (in_array('km', $locale, true)) {
                App::setLocale('km');
            } else {
                App::setLocale(app()->getLocale());
            }
        }
        $device = strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile') || strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'android') ? 'mobile' : 'web';
        config()->set('page.device', $device);
        return $next($request);
    }
}
