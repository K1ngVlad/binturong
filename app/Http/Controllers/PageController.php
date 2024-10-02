<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class PageController extends Controller
{
    public function home(): Response | RedirectResponse
    {
        if (Auth::check()) {
            return redirect('/main');
        }

        return Inertia::render('Home', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    public function main(): Response
    {
        return Inertia::render('Main');
    }

    public function projects(): Response
    {
        return Inertia::render('Projects');
    }

    public function libary(): Response
    {
        return Inertia::render('Libary');
    }

    public function admin(): Response
    {
        return Inertia::render('Admin/Main');
    }

    public function import(): Response
    {
        return Inertia::render('Admin/Import');
    }
}
