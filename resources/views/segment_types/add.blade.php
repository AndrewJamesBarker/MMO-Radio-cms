@extends ('layout.console')

@section ('content')

<section class="w3-padding form-container">

    <h2>Add Segment Type</h2>

    <form method="post" action="/console/segment_types/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="type_name">Type Name: </label>
            <input type="text" name="type_name" id="type_name" value="{{old('type_name')}}" required>
            
            @if ($errors->first('type_name'))
                <br>
                <span class="w3-text-red">{{$errors->first('type_name')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Add Segment Type</button>

    </form>

    <a href="/console/types/list">Back to Segment Type List</a>

</section>

@endsection