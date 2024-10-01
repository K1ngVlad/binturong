<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class UserImportController extends Controller
{
    public function import() 
    {
        Excel::import(new UsersImport, public_path('base.xlsx'));
        dd('All good!');
        return redirect('/')->with('success', 'All good!');
    }
}
