<?php

namespace App\Http\Controllers;

use App\Functions\Helper;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\json;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // prendo id user
        $user_id = Auth::id();

        // lista di tutti i progetti
        $projects = Project::where('user_id', $user_id)->get();

        return view('projectindex', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createproject');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // prendiamo id user perchè nel form non lo da
        $data['user_id'] = Auth::id();
        // gestione slug
        $data['slug'] = Helper::generateSlug($data['project_title'], Project::class);

        Project::create($data);

        return redirect()->route('projects.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
