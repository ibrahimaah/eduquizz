<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null; // API requests should not be redirected
        }

        // Check if the request is for an admin route
        if ($request->is('admin/*')) {
            return route('admin.login'); // Redirect to admin login
        }

        return route('login'); // Default redirect to user login
    }
}
