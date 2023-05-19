@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Internal Systems</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th></th>
            <th>System Name</th>
            <th>Request API Url</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($internal_systems as $internal_system)
            <tr>
                <td>
                    @if ($internal_system->system_icon)
                        <img src="{{asset('storage/'.$internal_system->image)}}" width="200">
                    @endif
                </td>
                <td>{{$internal_system->system_name}}</td>
                <td>{{$internal_system->request_api_url}}</td>
                <td><a href="/console/internal_systems/image/{{$internal_system->id}}">Image</a></td>
                <td><a href="/console/internal_systems/edit/{{$internal_system->id}}">Edit</a></td>
                <td><a href="/console/internal_systems/delete/{{$internal_system->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/internal_systems/add" class="w3-button w3-green">New Internal System</a>

</section>

@endsection