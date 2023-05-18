@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Sub-Segment Types</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>Sub-Segment Name</th>
            <th>Segment Type Name</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($sub_segment_types as $sub_segment_type)
            <tr>       
                <td>{{$sub_segment_type->sub_segment_name}}</td>  
                <td>{{$sub_segment_type->segmenttype->type_name}}</td>
                <td><a href="/console/sub_segment_types/edit/{{$sub_segment_type->id}}">Edit</a></td>
                <td><a href="/console/sub_segment_types/delete/{{$sub_segment_type->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/sub_segment_types/add" class="w3-button w3-green">New Sub-Segment Type</a>

</section>

@endsection
