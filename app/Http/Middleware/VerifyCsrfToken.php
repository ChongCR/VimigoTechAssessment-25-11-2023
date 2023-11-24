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
        //FOR POSTMAN TEST
        '/index',
        '/index/studentManagement/lists',
        '/index/studentManagement/details/*',
        '/index/studentManagement/create',
        '/index/studentManagement/store',
        '/index/studentManagement/edit/*',
        '/index/studentManagement/update/*',
        '/index/studentManagement/delete/*',
        '/logout',
        '/index/studentManagement/import',
        '/generate-excel',
        '/index/studentManagement/students/search',
        '/login',
        '/register',
        '/logout'
    ];
}
