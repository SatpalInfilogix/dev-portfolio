<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.projects.index');
    }

    /**
     * Display a listing of the resource in DataTable.
     */
    public function getProjects(Request $request)
    {
        $projects = [
            [
                'id' => 1, 
                'title' => 'Project Alpha',
                'technologies' => 'Laravel, Vue.js',
                'status' => 'Completed'
            ],
            [
                'id' => 2, 
                'title' => 'Project Beta',
                'technologies' => 'React, Node.js',
                'status' => 'In Progress'
            ],
        ];
        

        // Get search value from request
        $searchValue = $request->input('search.value', '');

        // Filter projects based on search value
        $filteredProjects = array_filter($projects, function ($project) use ($searchValue) {
            return stripos($project['title'], $searchValue) !== false;
        });

        // Pagination logic
        $start = intval($request->input('start', 0));
        $length = intval($request->input('length', 10));
        $paginatedProjects = array_slice($filteredProjects, $start, $length);

        // Prepare response
        $response = [
            'draw' => intval($request->input('draw', 1)),
            'recordsTotal' => count($projects),
            'recordsFiltered' => count($filteredProjects),
            'data' => $paginatedProjects
        ];

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
