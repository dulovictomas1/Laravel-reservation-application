@include('layouts.header')

@include('layouts.header-navigation')

<header class="bg-white shadow" style="background-color: rgb(48, 48, 48); color: white;">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <a href="{{ route('sluzby.index') }}" style="margin-bottom: 15px">&lt;&lt; <small>SPÄŤ</small></a>
        <br>
        <br>

        <h2 class="heading-h2"><strong>{{ $detail->job_name }}</strong></h2>
        <p>{{ $detail->description }}</p>
    </div>
</header>

    <main>
    
    @yield('content')    


@include('layouts.footer')