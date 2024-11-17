<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class InjectSettings
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Obtener todas las configuraciones en una sola consulta
        $settings = Setting::query()
            ->whereIn('key', [
                'APP_LOGO',
                'APP_DIRECTION',
                'APP_PHONE',
                'APP_EMAIL',
                'FACEBOOK_URL',
                'TWITTER_URL',
            ])
            ->pluck('value', 'key');

        Inertia::share([
            'APP_LOGO' => $settings['APP_LOGO'] ?? null,
            'APP_DIRECTION' => $settings['APP_DIRECTION'] ?? null,
            'APP_PHONE' => $settings['APP_PHONE'] ?? null,
            'APP_EMAIL' => $settings['APP_EMAIL'] ?? null,
            'FACEBOOK_URL' => $settings['FACEBOOK_URL'] ?? null,
            'INSTAGRAM_URL' => $settings['TWITTER_URL'] ?? null,
        ]);

        return $next($request);
    }
}
