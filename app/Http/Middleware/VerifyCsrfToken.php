<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'http://127.0.0.1:3000/*',
        'http://127.0.0.1:8000/*',
        'http://localhost:3000/*',
        'http://calc-next-ts.vercel.app',
        'http://calc-next-ts.vercel.app/*',
        'https://calc-next-ts.vercel.app',
        'https://calc-next-ts.vercel.app/*',
        'https://iferno.ru',
        'https://iferno.ru/*',
        'http://back.test.dushmaster.ru',
        'http://back.test.dushmaster.ru/*',
        'http://test.api.iferno.ru',
        'http://test.api.iferno.ru/*'
    ];
}
