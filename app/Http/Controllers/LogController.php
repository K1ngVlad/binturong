<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class LogController extends Controller
{
    public function getLogs()
    {
        $logs = File::get(storage_path('logs/laravel.log'));
        return response()->json(array_reverse(explode("\n", $logs)));
    }
}
