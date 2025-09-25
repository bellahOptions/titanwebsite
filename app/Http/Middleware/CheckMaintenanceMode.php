<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\SettingsService;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    protected $settingsService;

    public function __construct(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;
    }

    public function handle(Request $request, Closure $next): Response
    {
        // Allow access to maintenance mode page itself
        if ($request->is('maintenance')) {
            return $next($request);
        }

        // Allow access to admin routes and login even in maintenance mode
        if ($this->settingsService->isMaintenance() && 
            !$request->is('admin/*') && 
            !$request->is('login') &&
            !$request->is('logout') &&
            !auth()->check()) {
            
            return redirect()->route('maintenance.page');
        }

        // If user is logged in, allow access even in maintenance mode
        if ($this->settingsService->isMaintenance() && auth()->check()) {
            // Optional: Show a warning message
            if (!$request->is('admin/*')) {
                // You can flash a message here if you want
            }
        }

        return $next($request);
    }
}