<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SegmentType;
use App\Models\SegmentField;
use App\Models\User;
use App\Models\InternalSystem;
use App\Models\Segment;
use Illuminate\Support\Facades\Auth;

class SegmentFormController extends Controller
{
    public function list()
    {
        $segments = Segment::all();
        return view('segment_forms.list', compact('segments'));
    }

    public function addForm(Request $request)
    {
        $segment_type_id = $request->query('segment_type_id');
        $segmentFields = SegmentField::all();
        return view('segment_forms.add', compact('segment_type_id', 'segmentFields'));
    }

    public function store(Request $request)
{
    // Obtain the user ID
    $user_id = Auth::user()->id;

    $segment_type_id = $request->query('segment_type_id');

    // Merge the user_id with the form data
    $attributes = array_merge($request->all(), ['user_id' => $user_id],['segment_type_id' => $segment_type_id]);

    // Validate the form data
    $validatedData = request()->validate([
        'title' => 'required',
        'segment_data' => 'required',
        'segment_type_id' => 'required',
        'internal_system_id' => 'required',
    ]);

    // Create a new segment instance
    $segment = new Segment();

    // Assign the form data to the segment model
    $segment->title = $validatedData['title'];
    $segment->segment_data = $validatedData['segment_data'];
    $segment->segment_type_id = $validatedData['segment_type_id'];
    $segment->internal_system_id = 1; 
    $segment->user_id = $user_id;

    // Save the segment
    $segment->save();

    // Optionally, you can redirect to a success page or perform additional actions

    // Redirect to the segment list page
    return redirect()->route('segment_forms.list');
}

}
