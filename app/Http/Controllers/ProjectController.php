<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\ProjectImport;
use App\Models\Project;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
        $search = $request->search;
        $portfolio_year = $request->portfolio_year;
        $archive = $request->archive;
        $project_year = $request->project_year;

        if (!$portfolio_year && !$archive && !$project_year) {
            return Inertia::render('Projects', [
                'projects'  => [],
            ]);
        }

        $query = Project::with('projectCost', 'projectDocument', 'projectGoal', 'projectMonitoring', 'projectOrganizationalStructure', 'projectState', 'projectState', 'projectTerm');

        $query->where(function ($query) use ($archive, $portfolio_year, $project_year) {
            if ($archive) {
                $query->where('status', 'Архив');
            }

            if ($portfolio_year) {
                $query->orWhere('status', 'в портфеле');
            }

            if ($project_year) {
                $query->orWhere('status', 'проектная инициатива');
            }
        });

        // $projects = Project::with('projectCost', 'projectDocument', 'projectGoal', 'projectMonitoring', 'projectOrganizationalStructure', 'projectState', 'projectState', 'projectTerm')

        // $projects = $query
        //     ->where('name', 'ilike', '%' . $search . '%')
        //     ->orWhere('code', 'ilike', '%' . $search . '%')
        //     ->orWhere('stage', 'ilike', '%' . $search . '%')
        //     ->get();

        $query->where(function ($query) use ($search) {
            $query
                ->where('name', 'ilike', '%' . $search . '%')
                ->orWhere('code', 'ilike', '%' . $search . '%')
                ->orWhere('stage', 'ilike', '%' . $search . '%');
        });

        $projects = $query->get();

        return Inertia::render('Projects', [
            'projects'  => $projects,
            'type' => 'base'
        ]);
    }
}
