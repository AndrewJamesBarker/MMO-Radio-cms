@extends('layout.console')

@section('content')
<section class="w3-padding form-container">

        @php
            $typeName = '';

            if ($segment_type_id == 1) {
                $typeName = 'Report';
            } elseif ($segment_type_id == 2) {
                $typeName = 'Joke';
            } elseif ($segment_type_id == 3) {
                $typeName = 'Game';
            }
        @endphp
        
    <h2>Edit {{$typeName}}</h2>


<!-- retrieving, decoding from json, separating title from segment_data and inserting into columns  
using field_name as segment_data json keys -->

    @if (isset($segmentFields))
    <form method="post" action="{{ route('segment_forms.edit', ['segment' => $segment->id]) }}" novalidate>
        @csrf

        @foreach ($segmentFields as $segmentField)
            @if ($segmentField->segment_type_id == $segment_type_id)
                <br>
                <label>{{ $segmentField->field_label }}</label>
                @if (preg_match('/^title$/i', $segmentField->field_name))
                    @php
                        $fieldName = 'custom_title'; // Use a custom name for the input field
                        $fieldValue = old($fieldName, $segment->title);
                    @endphp
                    <input type="text" name="{{ $fieldName }}" value="{{ $fieldValue }}">
                @else
                    @php
                        $fieldName = "segment_data[{$segmentField->field_name}]";
                        $fieldValue = old($fieldName, isset($segment->segment_data) ? json_decode($segment->segment_data)->{$segmentField->field_name} ?? '' : '');
                    @endphp
                    @if ($segmentField->field_data_type === 'text')
                        <input type="text" name="{{ $fieldName }}" value="{{ $fieldValue }}">
                    @elseif ($segmentField->field_data_type === 'textarea')
                        <textarea name="{{ $fieldName }}">{{ $fieldValue }}</textarea>
                    @elseif ($segmentField->field_data_type === 'checkbox')
                        <input type="checkbox" name="{{ $fieldName }}" value="1" {{ $fieldValue ? 'checked' : '' }}>
                    @elseif ($segmentField->field_data_type === 'radio')
                        <input type="radio" name="{{ $fieldName }}" value="1" {{ $fieldValue ? 'checked' : '' }}>
                    @elseif ($segmentField->field_data_type === 'select')
                        <select name="{{ $fieldName }}">
                            <option value="">Select an option</option>
                            @foreach ($segmentField->options as $option)
                                @php
                                    $selected = $fieldValue == $option ? 'selected' : '';
                                @endphp
                                <option value="{{ $option }}" {{ $selected }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    @endif
                @endif
            @endif
        @endforeach

    <!-- editing sub_segment_data in the segment_data json object -->

        @if ($subSegmentTypes->count() > 0)
            <br>
            <label>Select Sub-Segment Type</label>
            <select name="sub_segment_type_id">
                <option value="">Select Sub-Segment Type</option>
                @foreach ($subSegmentTypes as $subSegmentType)
                    @php
                        $decodedSegmentData = json_decode($segment->segment_data, true);
                        $selected = old('sub_segment_type_id', $decodedSegmentData['sub_segment_name'] ?? '') == $subSegmentType->sub_segment_name ? 'selected' : '';
                    @endphp
                    <option value="{{ $subSegmentType->id }}" {{ $selected }}>
                        {{ $subSegmentType->sub_segment_name }}
                    </option>
                @endforeach
            </select>
        @endif

<!-- hidden fields default to user role reporter(done in controller), internal_system value 1 is reporters, 
and segment_type of whichever user selected type (report/joke/game/etc) -->

        <input type="hidden" name="segment_type_id" value="{{ $segment_type_id }}">

            <input type="hidden" name="internal_system_id" value="1">

            <br>
            <button type="submit" class="w3-button w3-green">Update Segment Form</button>
        </form>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route('segment_forms.list') }}">Back to Segment Form List</a>
</section>
@endsection
