@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Segment Form Fields</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>Field Name</th>
            <th>Field Data Type</th>
            <th>Segment Type ID</th>
            <th></th>
            <!-- <th>Created</th> -->
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($segment_fields as $segment_field)
            <tr>       
                <td>{{$segment_field->field_name}}</td>  
                <td>{{$segment_field->field_data_type}}</td>  
                <td>{{$segment_field->segmenttype->id}}</td>
                <td><a href="/console/segment_fields/edit/{{$segment_field->id}}">Edit</a></td>
                <td><a href="/console/segment_fields/delete/{{$segment_field->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/projects/add" class="w3-button w3-green">New Segment Fields</a>

</section>

@endsection
