<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\SegmentType;
use App\Models\SegmentField;
use App\Models\InternalSystem;
use App\Models\Segment;


class SegmentFormController extends Controller
{

    public function list()
    {
        return view('segment_forms.list', [
            'segments' => Segment::all()
        ]);
    }

    public function showForm(Request $request)
    {
        $segmentTypeId = $request->query('segment_type_id');

        return view('segment_forms.add', [
            'segmentTypeId' => $segmentTypeId,
            'user_id' => User::all(),
            'internal_system_id' => InternalSystem::all(),
            'segment_fields' => SegmentField::all(),
        ]);

        // Load the form based on the segment type ID
        // Perform any necessary logic here to retrieve the form based on the segment type ID

    }
}

