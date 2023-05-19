@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Edit Internal System</h2>

    <form method="post" action="/console/internal_systems/edit/{{$internal_system->id}}" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="system_name">System Name:</label>
            <input type="test" name="system_name" id="system_name" value="{{old('system_name', $internal_system->system_name)}}" required>
            
            @if ($errors->first('system_name'))
                <br>
                <span class="w3-text-red">{{$errors->first('system_name')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="request_api_url">Request API URL:</label>
            <input type="url" name="request_api_url" id="request_api_url" value="{{old('request_api_url', $internal_system->request_api_url)}}">

            @if ($errors->first('request_api_url'))
                <br>
                <span class="w3-text-red">{{$errors->first('request_api_url')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Edit Internal System</button>

    </form>

    <a href="/console/projects/list">Back to Internal System List</a>

</section>

@endsection
