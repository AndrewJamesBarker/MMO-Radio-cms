<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SegmentType;

class SegmentTypesController extends Controller
{
    //
    public function list()
    {
        return view('segment_types.list', [
            'segment_types' => SegmentType::all()
        ]);
    }
}
