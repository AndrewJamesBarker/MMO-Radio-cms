<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
