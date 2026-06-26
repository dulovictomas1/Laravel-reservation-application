<x-app-layout>

    <x-slot name="header">
        <h2>Klienti</h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

    @if (session('success'))
        <p class="text-green-600">{{ session('success') }}</p>
    @endif

    @foreach ($clients as $client)

        <div class="border p-4 mb-3" style="margin-bottom: 20px">

            <h2 class="font-semibold">{{ $client->job_name }}</h2>
            <p>{{ $client->user->email }}</p>

            <form method="POST" action="{{ route('admin.clients.update', $client->id) }}">

                @csrf

                <select name="status" class="border p-1" style="width: 150px">
                    <option value="0" @selected($client->status == 0)>Skryté</option>
                    <option value="1" @selected($client->status == 1)>Publikované</option>
                </select>

                <button class="ml-2 bg-blue-600 text-white px-3 py-1 rounded">
                    Uložiť
                </button>

            </form>

        </div>

    @endforeach

    </div>
    </div>
    </div>

</x-app-layout>