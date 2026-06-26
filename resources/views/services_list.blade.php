@include('layouts.header')

@include('layouts.header-navigation')

<header class="bg-white shadow" style="background-color: rgb(48, 48, 48); color: white;">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="heading-h2">Zoznam služieb</h2>
        <p>Je to jednoduché, všetky služby na jednom mieste, vyberte si akú hľadáte a rovno si rezervujte termín. Bez zbytočného vyvolávania či vypisovania</p>
    </div>
</header>

        <main>

        <div class="service_list_all">

            <div class="filter_list p-4 sm:p-8 bg-white shadow sm:rounded-lg complet_list">
                <h2>Filtrovať podľa typu:</h2>
                <br>

                <form action="{{ route('sluzby.index') }}" method="get" class="form-service-list">
                    <select name="tag" id="service-tag">                        
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" @selected(request('tag') == $tag->id)>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    
                    <button class="btn_filter" type="submit">Filtrovať</button>
                </form>
                <br>

                <a href="{{ route('sluzby.index') }}" style="margin-bottom: 15px">Resetovať</a>

            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg complet_list">

                @foreach ($details as $detail)
                    <div class="service">
                        <h4>{{ $detail->job_name }}</h4>

                        <a href="{{ route('book.show', $detail->user->token_UNIQ) }}">
                            Chcem si rezervovať
                        </a>
                    </div>
                @endforeach

            </div>

        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
        </main>
        
@include('layouts.footer')