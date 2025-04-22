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
<<<<<<< HEAD
        'user/webhook/paystack',
        'user/webhook/transfer',
        // 'paystack/*',
=======
        // 'admin/*',
        // 'user/*',
        // 'advisory/*',
        // 'facilitator/*',
>>>>>>> 7024077c20591e5e55fcbd48ce6f04afa2b8a5a9
    ];
}
