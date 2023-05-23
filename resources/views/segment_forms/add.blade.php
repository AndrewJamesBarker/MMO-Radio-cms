@extends('layout.console')

@section('content')
<section class="w3-padding">
    <h2> Segment</h2>

    <a href="{{ route('segment_forms.add', ['segment_type_id' => 1]) }}">Report</a>
    <br>
    <a href="{{ route('segment_forms.add', ['segment_type_id' => 2]) }}">Joke</a>
    <br>
    <a href="{{ route('segment_forms.add', ['segment_type_id' => 3]) }}">Game</a>
    <br>
    <br>

    @if (isset($segmentFields))
        <form method="post" action="{{ route('segment_forms.store') }}" novalidate>
            @csrf

            @foreach ($segmentFields as $segmentField)
                @if ($segmentField->segment_type_id == $segment_type_id)
                    <br>     
                    <label>{{ $segmentField->field_name }}</label>
                    @if ($segmentField->field_data_type == "text")
                        <input type="text" name="{{ preg_match('/^title$/i', $segmentField->field_name) ? 'title' : 'segment_data['.$segmentField->field_name.']' }}">
                    @elseif ($segmentField->field_data_type == "textarea")
                        <textarea name="segment_data[{{ $segmentField->field_name }}]" id="{{ $segmentField->field_name }}"></textarea>
                    @elseif ($segmentField->field_data_type == "checkbox")
                        <input type="checkbox" name="segment_data[{{ $segmentField->field_name }}]" id="{{ $segmentField->field_name }}" value="1">
                    @elseif ($segmentField->field_data_type == "radio")
                        <input type="radio" name="segment_data[{{ $segmentField->field_name }}]" id="{{ $segmentField->field_name }}" value="1">
                    @endif
                @endif
            @endforeach

            @if ($subSegmentTypes->count() > 0)
                <br>
                <label>Select Sub-Segment Type</label>
                <select name="sub_segment_type_id">
                    <option value="">Select Sub-Segment Type</option>
                    @foreach ($subSegmentTypes as $subSegmentType)
                        <option value="{{ $subSegmentType->id }}">{{ $subSegmentType->sub_segment_name }}</option>
                    @endforeach
                </select>
            @endif


            <input type="hidden" name="segment_type_id" value="{{ $segment_type_id }}">
            <input type="hidden" name="internal_system_id" value="1">

            <br>
            <button type="submit" class="w3-button w3-green">Add Segment</button>
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

    <a href="{{ route('segment_forms.list') }}">Back to Segment List</a>
</section>
@endsection
