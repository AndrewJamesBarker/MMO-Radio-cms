@extends('layout.frontend', ['title' => 'Home'])

@section('content')

<section class="w3-padding">

    <!-- <h2 class="w3-text-blue med-titles">Welcome!</h2> -->

    <p class="para-container frontend-para">
        <em><span class="w3-text-blue">As</span> a reporter, you can do many things. You can create ideas for
        news stories, or create segments like trivia, games, songs,
        and advertisements! See below for some examples.</em>
    </p>

</section>

<hr>

<section class="w3-padding">

    <h2 class="med-titles orange-text"><span class="red-text">Segments</span> Of The Past</h2>

    @foreach ($segments as $segment)
        <div class="w3-card w3-margin glass-effect">
            <div class="w3-container black-background">
                <h3>{{$segment->title}}</h3>
            </div>
            <div class="frontend-segment-data">
                <p>{{ data_get(json_decode($segment->segment_data), 'sub_segment_name') }}</p>
                <p>{{ data_get(json_decode($segment->segment_data), 'content') }}</p>
                <p>{{ data_get(json_decode($segment->segment_data), 'joke') }}</p>
            </div>
            
            @if ($segment->image)
                <div class="w3-container w3-margin-top w3-padding">
                    <img src="{{asset('storage/'.$segment->image)}}" width="100">
                </div>
            @endif
        </div>
    @endforeach


</section>

<hr>

<!-- <section class="w3-padding">
    <p>
        Email: <a href="mailto:email@address.com">email@address.com</a>
    </p>
</section> -->

@endsection
