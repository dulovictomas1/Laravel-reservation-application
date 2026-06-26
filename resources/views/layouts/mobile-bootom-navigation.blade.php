<div class="mobile_navigation">  
    <div class="mibile-navigation-inner"> 
        <div class="icon-mobile-wrap">       
            <a href="{{ route('home') }}">
                <i class="fa-solid fa-house"></i>
                <span>Domov</span>
            </a>
        </div>
        <div class="icon-mobile-wrap"> 
            <i class="fa-solid fa-bars menu-toggle"></i>
            <span>Menu</span>
        </div>
        <div class="icon-mobile-wrap"> 
            <a href="{{ route('sluzby.index') }}">
                <i class="fa-solid fa-bell-concierge"></i>
                <span>Služby</span>
            </a>
        </div>
        <div class="icon-mobile-wrap"> 
            <i class="fa-solid fa-magnifying-glass"></i>
            <span>Hľadať</span>
        </div>
        <div class="icon-mobile-wrap"> 
            <i class="fa-solid fa-filter"></i>
            <span>Filter</span>
        </div>
    </div>

    <nav class="main-nav">
    <ul>
        <li><a href="{{ route('home') }}">-> Domov</a></li>
        <li><a href="{{ route('sluzby.index') }}">-> Služby</a></li>
            @if (Route::has('login'))                
                @auth
                    <li><a href="{{ url('/dashboard') }}">-> Dashboard</a></li>
            @else
                    <li><a href="{{ route('login') }}">-> Log in</a></li>

            @if (Route::has('register'))
                <li><a href="{{ route('register') }}">-> Register</a></li>
            @endif
                @endauth                
            @endif
    </ul>
</nav>
</div>