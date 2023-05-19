@extends ('layout.frontend', ['title' => 'Home'])

@section ('content')

<section class="w3-padding">
        
    <h2 class="w3-text-blue">Welcome!</h2>

    <p>
        Quisque felis ex, pellentesque vel elementum eu, bibendum vel massa. Donec id feugiat 
        erat. Aliquam commodo rutrum velit, vitae vestibulum purus ullamcorper vestibulum. Orci 
        varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
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
                    <img src="{{asset('storage/'.$segment->image)}}" width="200">
                </div>
            @endif


        </div>

    @endforeach

</section>

<hr>

<section class="w3-padding">

    <h2 class="w3-text-blue">Contact Me</h2>

    <p>
        Phone: 111.222.3333
        <br>
        Email: <a href="mailto:email@address.com">email@address.com</a>
    </p>

</section>

@endsection
