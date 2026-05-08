<x-app-layout>

    <x-slot name="header">
        <h2>Nastavenia rezervácií a údajov</h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

        @if (session('success'))
            <p class="succes_mgs_detail">{{ session('success') }}</p>
        @endif

        <form method="POST" action="{{ route('user-details.update') }}">

            @csrf
            <div class="pole">
                <div class="label-popis block font-medium text-sm text-gray-700">Časy (zadajte vo formáte 07:00, 10:00, 10:30, 12:00)</div>
                <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" type="text" name="times" value="{{ old('times', $detail->times ?? '') }}">
            </div>

            @error('times') <p>{{ $message }}</p> @enderror

            <div class="pole">
                <div class="label-popis block font-medium text-sm text-gray-700">Názov služby</div>
                <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" type="text" name="job_name" value="{{ old('job_name', $detail->job_name ?? '') }}">
            </div>
            
            <div class="pole">
                <div class="label-popis block font-medium text-sm text-gray-700">Mesto</div>
                <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" type="text" name="city" value="{{ old('city', $detail->city ?? '') }}">
            </div>

            <div class="pole">
                <div class="label-popis block font-medium text-sm text-gray-700">Ulica</div>
                <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" type="text" name="street" value="{{ old('street', $detail->street ?? '') }}">
            </div>

            <div class="pole">
                <div class="label-popis block font-medium text-sm text-gray-700">Popis</div>
                <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="description">{{ old('description', $detail->description ?? '') }}</textarea>
            </div>

            <div class="pole">
                <div class="label-popis block font-medium text-sm text-gray-700">Služba</div>
                <!--<input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" type="text" name="service_tag" value="{{ old('service_tag', $detail->service_tag ?? '') }}">-->
                <select name="service_tag" id="service_tag">
                    <option value="1" @selected($detail->service_tag == 1)>Kadernícke služby</option>
                    <option value="2" @selected($detail->service_tag == 2)>Masážne služby</option>
                </select>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Uložiť</button>
            </div>
        </form>

    </div>
    </div>
    </div>

</x-app-layout>