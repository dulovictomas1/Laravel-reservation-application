<header class="header_public {{ $head_class ?? '' }}">
        <div class="header-inner">
           <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>
            </div>
            <div>
                <nav class="navigation">
                    <ul>
                        <li><a href="{{ route('home') }}">Domov</a></li>
                        <li><a href="{{ route('sluzby.index') }}">Služby</a></li>
                        @if (Route::has('login'))                
                    @auth
                        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Log in</a></li>

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth                
            @endif
                    </ul>
                </nav>
            </div>
        </div>        
    </header>   