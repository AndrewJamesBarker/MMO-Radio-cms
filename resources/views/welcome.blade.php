@extends ('layout.frontend', ['title' => 'Home'])

@section ('content')

<section class="w3-padding">
        
    <h2 class="w3-text-blue">Welcome!</h2>

    <p>
        As a reporter, you can do many things. You can create ideas for
        news stories, or create segments like trivia, games, songs,
        and advertisements! See below for some examples.
    </p>


</section>

<hr>

<section class="w3-padding w3-container">

    <h2 class="w3-text-blue">Segments</h2>

    @foreach ($segments as $segment)

        <div class="w3-card w3-margin">

            <div class="w3-container w3-blue">

                <h3>{{$segment->title}}</h3>

            </div>
            
            @if ($segment->image)
                <div class="w3-container w3-margin-top">
                    <img src="{{asset('storage/'.$segment->image)}}" width="100">
                </div>
            @endif


        </div>

    @endforeach

</section>

<hr>

<section class="w3-padding">

    <h2 class="w3-text-blue">Sign Up</h2>

    <p>
        Email: <a href="mailto:email@address.com">email@address.com</a>
    </p>

</section>

@endsection
