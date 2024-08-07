<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AdminAuthenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('admin.login');
        }
    }

    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('admin')->check()) {
            $this->auth->shouldUse('admin');
            return;
        }

        $this->unauthenticated($request, ['admin']);
    }
}
