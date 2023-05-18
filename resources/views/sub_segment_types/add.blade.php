@extends ('layout.console')

@section ('content')


<section class="w3-padding">

    <h2>Add Sub-Segment Type</h2>

    <form method="post" action="/console/sub_segment_types/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="sub_segment_name">Sub-Segment Name:</label>
            <input type="sub_segment_name" name="sub_segment_name" id="sub_segment_name" value="{{old('sub_segment_name')}}" required>
            
            @if ($errors->first('sub_segment_name'))
                <br>
                <span class="w3-text-red">{{$errors->first('sub_segment_name')}}</span>
            @endif
        </div>
    
        <div class="w3-margin-bottom">
            <label for="segment_type_id">Segment Type:</label>
            <select name="segment_type_id" id="segment_type_id">
                <option></option>
                @foreach ($segment_type_id as $segment_type_id)
                    <option value="{{$segment_type_id->id}}"
                        {{$segment_type_id->id == old('segment_type_id') ? 'selected' : ''}}>
                        {{$segment_type_id->type_name}}
                    </option>
                @endforeach
            </select>
            @if ($errors->first('segment_type_id'))
                <br>
                <span class="w3-text-red">{{$errors->first('segment_type_id')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Add Sub-Segment Type</button>

    </form>

    <a href="/console/sub_segment_types/list">Back to Sub-Segment Type List</a>

</section>

@endsection