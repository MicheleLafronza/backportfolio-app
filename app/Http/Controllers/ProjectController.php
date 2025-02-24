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
        $request->validate([
            'project_title' => 'required|max:50',
            'summary' => 'required|max:100',
            'description' => 'required',
            'img1' => 'required|image|mimes:png|max:2048',
            'img2' => 'nullable|image|mimes:png|max:2048',
            'img3' => 'nullable|image|mimes:png|max:2048'
        ]);

        $data = $request->all();
        // prendiamo id user perchè nel form non lo da
        $data['user_id'] = Auth::id();
        // gestione slug
        $data['slug'] = Helper::generateSlug($data['project_title'], Project::class);

         // 📌 Controlliamo che img1 esista prima di assegnarlo
    if ($request->hasFile('img1')) {
        $data['img1'] = $request->file('img1')->store('uploads', 'public'); 
    } else {
        return back()->withErrors(['img1' => 'Errore nel caricamento dell\'immagine.']);
    }

    if ($request->hasFile('img2')) {
        $data['img2'] = $request->file('img2')->store('uploads', 'public'); 
    }

    if ($request->hasFile('img3')) {
        $data['img3'] = $request->file('img3')->store('uploads', 'public'); 
    }

        Project::create($data);

        return redirect()->route('projects.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('showproject', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('editproject', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'project_title' => 'required|max:50',
            'summary' => 'required|max:100',
            'description' => 'required',
            // 'img1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'img2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'img3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($data['project_title'] != $project->project_title) {
            // gestione slug
            $data['slug'] = Helper::generateSlug($data['project_title'], Project::class);
        } else {
            $data['slug'] = $project->slug;
        };

        $project->update($data);

        return redirect()->route('projects.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
