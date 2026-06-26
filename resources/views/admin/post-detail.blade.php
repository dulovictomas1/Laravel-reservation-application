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

    @if (session('errors'))
        <p class="text-red-600">{{ session('errors') }}</p>
    @endif

        <div class="border p-4 mb-3" style="margin-bottom: 20px">            
            
            <form action="{{ route('admin.post.update', $posts->id) }}" method="post">
                @csrf

                <div class="pole">
                    <div class="label-popis block font-medium text-sm text-gray-700">Názov stránky</div>
                    <input type="text" name="name" id="" value="{{ old('name', $posts->name ?? '') }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">    
                </div>

                <div class="pole">
                    <div class="label-popis block font-medium text-sm text-gray-700">URL adresa</div>
                    <input type="text" name="slug" id="" value="{{ old('slug', $posts->slug ?? '') }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">    
                </div>
                
                <div class="pole">
                    <textarea name="text" id="" cols="30" rows="10" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">{{ old('text', $posts->text ?? '') }}</textarea>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Uložiť</button>
                </div>
            </form>

        </div>

    </div>
    </div>
    </div>

</x-app-layout>