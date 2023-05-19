<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Segment;
use App\Models\SegmentType;
use App\Models\InternalSystem;

class SegmentsController extends Controller
{
    public function list()
    {
        return view('segments.list', [
            'segments' => Segment::all()
        ]);
    }

    public function addForm()
    {
        return view('segments.add', [
            'segment_type_id' => SegmentType::all(),
            'user_id' => User::all(),
            'internal_system_id' => InternalSystem::all(),
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'segment_data' => 'required',
            'segment_type_id' => 'required',
            'internal_system_id' => 'required',
            'user_id' => 'required',
        ]);

        $segment = new Segment();
        $segment->title = $attributes['title'];
        $segment->segment_data = $attributes['segment_data'];
        $segment->segment_type_id = $attributes['segment_type_id'];
        $segment->internal_system_id = $attributes['internal_system_id'];
        $segment->user_id = Auth::user()->id;
        $segment->save();

        return redirect('/console/segments/list')
            ->with('message', 'segment has been added!');
    }

    public function editForm(Project $project)
    {
        return view('projects.edit', [
            'project' => $project,
            'types' => Type::all(),
        ]);
    }

    public function edit(Project $project)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'slug' => [
                'required',
                Rule::unique('projects')->ignore($project->id),
                'regex:/^[A-z\-]+$/',
            ],
            'url' => 'nullable|url',
            'content' => 'required',
            'type_id' => 'required',
        ]);

        $project->title = $attributes['title'];
        $project->slug = $attributes['slug'];
        $project->url = $attributes['url'];
        $project->content = $attributes['content'];
        $project->type_id = $attributes['type_id'];
        $project->save();

        return redirect('/console/projects/list')
            ->with('message', 'Project has been edited!');
    }

    public function delete(Project $project)
    {

        if($project->image)
        {
            Storage::delete($project->image);
        }
        
        $project->delete();
        
        return redirect('/console/projects/list')
            ->with('message', 'Project has been deleted!');        
    }

    public function imageForm(Project $project)
    {
        return view('projects.image', [
            'project' => $project,
        ]);
    }

    public function image(Project $project)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        if($project->image)
        {
            Storage::delete($project->image);
        }
        
        $path = request()->file('image')->store('projects');

        $project->image = $path;
        $project->save();
        
        return redirect('/console/projects/list')
            ->with('message', 'Project image has been edited!');
    }
    
}
