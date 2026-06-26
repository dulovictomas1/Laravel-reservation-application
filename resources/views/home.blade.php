@include('layouts.header')

<div class="{{ $body_class }} site-container">    

    @include('layouts.header-navigation')

    <div class="slider">
        <img src="images/img-01-bg.jpg" class="slide active">
        <img src="images/img-02-bg.jpg" class="slide">        
    </div>
    

    <main style="height: 100vh">
        <!-- Pridané utility triedy (napr. z Tailwindu), aby bol text na bielom pozadí čitateľný -->
        <div class="hero_home">
            <h1>Všetky služby na jednom mieste</h1>

            <a href="{{ route('sluzby.index') }}" class="btn_home_services">Idem na to -></a>

            <!-- <h1>{{-- $home->text --}}</h1> -->
        </div>
    </main>

</div>

@include('layouts.footer')