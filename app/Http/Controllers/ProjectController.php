<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('dashboard', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'image' => $imagePath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Proyecto agregado correctamente.');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::delete('public/' . $project->image);
            }
            $project->image = $request->file('image')->store('projects', 'public');
        }

        $project->update($request->only('title', 'description', 'url'));

        return redirect()->route('dashboard')->with('success', 'Proyecto actualizado.');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete('public/' . $project->image);
        }
        $project->delete();

        return redirect()->route('dashboard')->with('success', 'Proyecto eliminado.');
    }
}
