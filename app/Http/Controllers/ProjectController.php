<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\ProjectImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function import(Request $request)
    {
        if ($request->hasFile('table')) {
            $table = $request->file('table');
            // dd($table);
            // Excel::import(new ProjectImport, public_path('base.xlsx'));
            Excel::import(new ProjectImport, $table);
            return redirect('/')->with('success', 'All good!');
        }

        return redirect('/')->with('success', 'All good!');
    }

    public function filter(Request $request)
    {
        dd($request);
    }
}
