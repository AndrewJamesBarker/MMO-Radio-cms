<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SegmentType;
use App\Models\SegmentField;
use App\Models\User;
use App\Models\InternalSystem;
use App\Models\Segment;

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

    public function store()
    {
        // Validate the form data
        $attributes = request()->validate([
            'title' => 'required',
            // Add validation rules for other fields
        ]);

        // Create a new segment instance
        $segment = new Segment();

        // Assign the form data to the segment model
        $segment->title = request('title');
        // Assign other form fields to the corresponding model attributes

        // Save the segment
        $segment->save();

        // Optionally, you can redirect to a success page or perform additional actions

        // Redirect to the segment list page
        return redirect()->route('segment_forms.list');
    }
}

    

