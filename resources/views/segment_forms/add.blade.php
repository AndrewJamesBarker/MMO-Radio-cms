@extends('layout.console')

@section('content')
<section class="w3-padding">
    <h2>Add Segment</h2>

    <a href="{{ route('segment_forms.add', ['segment_type_id' => 1]) }}">Report</a>
    <br>
    <a href="{{ route('segment_forms.add', ['segment_type_id' => 2]) }}">Joke</a>
    <br>
    <a href="{{ route('segment_forms.add', ['segment_type_id' => 3]) }}">Game</a>
    <br>


    @if (isset($segmentFields))
        <form method="post" action="{{ route('segment_forms.store') }}" novalidate>
            @csrf

            @foreach ($segmentFields as $segmentField)
                @if ($segmentField->segment_type_id == $segment_type_id)
                <br>
                    <label>{{ $segmentField->field_name }}</label>
                    @if ($segmentField->field_data_type == "text")
                   
                        <input type="text" name="{{ $segmentField->field_name }}">
                    @elseif ($segmentField->field_data_type == "timestamp")
               
                        <input type="datetime-local" name="{{ $segmentField->field_name }}">
                    @elseif ($segmentField->field_data_type == "textarea")
                  
                        <textarea name="{{ $segmentField->field_name }}" id="{{ $segmentField->field_name }}"></textarea>
                    @endif
                @endif
            @endforeach
            <br>
            <button type="submit" class="w3-button w3-green">Add Segment</button>
        </form>
    @endif

    <a href="{{ route('segment_forms.list') }}">Back to Segment List</a>
</section>
@endsection
