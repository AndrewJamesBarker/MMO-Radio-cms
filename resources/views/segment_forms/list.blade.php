@extends ('layout.console')

@section ('content')

<section class="w3-padding">
  
    <h2 class="med-titles">Manage Segments</h2>


    <table class="w3-table w3-margin-bottom">
        <tr class="table-top">
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
                        <img src="{{asset('storage/'.$segment->image)}}" width="200">
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
    
    <a href="/console/segment_forms/add" class="w3-button w3-green">New Segment</a>

    <div class="pagination-container">
        {{$segments->links()}}
    </div>

</section>

@endsection
