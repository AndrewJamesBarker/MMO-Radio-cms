<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SegmentType;
use App\Models\SubSegmentType;

class SubSegmentTypesController extends Controller
{
    public function list()
    {
        return view('sub_segment_types.list', [
            'sub_segment_types' => SubSegmentType::all()
        ]);
     
    }

    public function addForm()
    {
        return view('sub_segment_types.add', [
            'segment_type_id' => SegmentType::all(),
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'sub_segment_name' => 'required',
            'segment_type_id' => 'required',
        ]);

        $subSegmentType = new SubSegmentType();
        $subSegmentType->sub_segment_name = $attributes['sub_segment_name'];
        $subSegmentType->segment_type_id = $attributes['segment_type_id'];
        $subSegmentType->save();

        return redirect('/console/sub_segment_types/list')
            ->with('message', 'Sub-Segment Type has been added!');
    }

    public function editForm(SegmentField $segmentField)
    {
        return view('segment_fields.edit', [
            'segment_field' => $segmentField,
            'segment_type_id' => SegmentType::all(),
        ]);
    }

    public function edit(SegmentField $segmentField)
    {

        $attributes = request()->validate([
            'field_name' => 'required',
            'field_data_type' => 'required',
            'segment_type_id' => 'required',
            // 'type_name' => 'nullable',
        ]);

        $segmentField->field_name = $attributes['field_name'];
        $segmentField->field_data_type = $attributes['field_data_type'];
        $segmentField->segment_type_id = $attributes['segment_type_id'];
        // $segmentField->type_name = $attributes['type_name'];
        $segmentField->save();

        return redirect('/console/segment_fields/list')
            ->with('message', 'Segment Field has been edited!');
    }

    public function delete(SegmentField $segmentField)
    {
        
        $segmentField->delete();
        
        return redirect('/console/segment_fields/list')
            ->with('message', 'Segment Field has been deleted!');        
    }

}
