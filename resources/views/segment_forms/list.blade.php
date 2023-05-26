@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Segments</h2>

    <div class="pagination-container">

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th></th>
            <th>Title</th>
            <th>Segment Data</th>
            <th>User</th>
            <th>Segment Type</th>
            <th>Internal System Name</th>
            <th>Date Created</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($segments as $segment)
            <tr>
                <td>
                    @if ($segment->image)
                        <img src="{{asset('storage/'.$segment->image)}}" width="100">
                    @endif
                </td>
                <td>{{$segment->title}}</td>
                <td>{{$segment->segment_data}}</td>
                <td>{{$segment->user->first . ' ' . $segment->user->last}}</td>
                <td>{{$segment->segmenttype->type_name}}</td>
                <td>{{$segment->internalsystem->system_name}}</td>
                <td>{{$segment->created_at->format('M j, Y')}}</td>
                <td><a href="/console/segment_forms/image/{{$segment->id}}">Image</a></td>
                <td><a href="/console/segment_forms/edit/{{$segment->id}}">Edit</a></td>
                <td><a href="/console/segment_forms/delete/{{$segment->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>

        {{$segments->links()}}
    </div>

    <a href="/console/segment_forms/add" class="w3-button w3-green">New Segment</a>

</section>

@endsection
