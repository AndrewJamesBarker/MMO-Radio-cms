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
    <br>

    @if (isset($segmentFields))
        <form method="post" action="{{ route('segment_forms.store') }}" novalidate>
            @csrf

            <div class="w3-margin-bottom">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required>
                @if ($errors->first('title'))
                    <br>
                    <span class="w3-text-red">{{ $errors->first('title') }}</span>
                @endif
            </div>

            @foreach ($segmentFields as $segmentField)
                @if ($segmentField->segment_type_id == $segment_type_id)
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

            <button type="submit" class="w3-button w3-green">Add Segment</button>
        </form>
    @endif

    <a href="{{ route('segment_forms.list') }}">Back to Segment List</a>
</section>
@endsection
