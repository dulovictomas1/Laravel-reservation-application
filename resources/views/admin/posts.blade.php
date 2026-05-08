<x-app-layout>

    <x-slot name="header">
        <h2>Zoznam stránok</h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

    @if (session('success'))
        <p class="text-green-600">{{ session('success') }}</p>
    @endif

    <div class="btn_create_post"><a href="{{ route('admin.post.createshow') }}">Vytvoriť stránku</a></div>

    @foreach ($posts as $post)

        <div class="border p-4 mb-3" style="margin-bottom: 20px">

            <h2 class="font-semibold">{{ $post->name }}</h2>
            <p>URL: <i>{{ $post->slug }}</i></p>
            
            <div class="detail_post">
                <a href="{{ route('admin.post-detail', $post->id) }}">Detail</a>
            </div> 

        </div>

    @endforeach

    </div>
    </div>
    </div>

</x-app-layout>