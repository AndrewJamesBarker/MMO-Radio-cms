@extends ('layout.console')

@section ('content')



<section class="w3-padding">

    <h2>Add Segment</h2>

    <form method="post" action="/console/segment_forms/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="title" name="title" id="title" value="{{old('title')}}" required>
            
            @if ($errors->first('title'))
                <br>
                <span class="w3-text-red">{{$errors->first('title')}}</span>
            @endif
        </div>

        <a href="{{ route('segments.add', ['segmentTypeId' => 1]) }}">Report</a>
        <br>
        <a href="{{ route('segments.add', ['segmentTypeId' => 2]) }}">Joke</a>
        <br>
        <a href="{{ route('segments.add', ['segmentTypeId' => 3]) }}">Game</a>
        <br>
        <br>
       
        @foreach ($segment_fields as $segment_field)
            <label>{{ $segment_field->label }}</label>

            @if ($segment_field->field_data_type == "text")
                <input type="{{ $segment_field->field_data_type }}" name="{{ $segment_field->field_name }}">
            
            @elseif ($segment_field->field_data_type == "date")
                <input type="{{ $segment_field->field_data_type }}" name="{{ $segment_field->field_name }}">

            @elseif ($segment_field->field_data_type == "textarea")
                <textarea name="{{ $segment_field->field_data_type }}" id="{{ $segment_field->field_name }}"></textarea>

            @endif
        @endforeach




        <button type="submit" class="w3-button w3-green">Add Segment</button>

    </form>

    <a href="/console/segment_forms/list">Back to Segment List</a>

</section>

@endsection