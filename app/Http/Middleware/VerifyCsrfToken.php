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
        'http://127.0.0.1:1234/api/customer-view',
        'http://127.0.0.1:1234/api/customer-view/*',
        'http://127.0.0.1:1234/api/category',
        'http://127.0.0.1:1234/api/category/*',
        'http://127.0.0.1:1234/api/products',
        'http://127.0.0.1:1234/api/products/*',
        'http://127.0.0.1:1234/api/register',
        'http://127.0.0.1:1234/api/orders',
        
        
    ];
}
