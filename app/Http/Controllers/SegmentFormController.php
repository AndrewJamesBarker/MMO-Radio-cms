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


    public function showForm($segment_type_id = null)
    {
        if ($segment_type_id !== null) {
            $segment_type = SegmentType::find($segment_type_id);

            if (!$segment_type) {
                abort(404); // Segment type not found
            }

            // Retrieve the fields associated with the segment type
            $segment_fields = SegmentField::where('segment_type_id', $segment_type_id)->get();

            return view('segment_forms.add', [
                'segment_type' => $segment_type,
                'segment_fields' => $segment_fields,
                'segment_type_id' => $segmentTypeId,
                'user_id' => User::all(),
                'internal_system_id' => InternalSystem::all(),
            ]);
        }

        // Handle the case when no segment type ID is provided
        // You can add your own logic here if needed

        return view('segment_forms.add', [
            'segment_fields' => [] // Pass an empty array if segment type ID is not provided
        ]);
    }



}

