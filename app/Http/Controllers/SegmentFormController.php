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

    
}
