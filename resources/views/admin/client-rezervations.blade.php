<x-app-layout>

    <x-slot name="header">
        <h2>Zoznam vašich rezervácii</h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    
    <h3>Dnešné rezervácie</h3>
    <hr>

    @forelse ($bookings[$today] ?? [] as $item)
        <p>{{ substr($item->booking_time, 0, 5) }} - {{ $item->customer_name }}</p>
    @empty
        <p>Dnes nemáte žiadne rezervácie.</p>
    @endforelse

    <br>
    <br>

    <h3>Zajtrajšie rezervácie</h3>
    <hr>
    @forelse ($bookings[$tommorrow] ?? [] as $item)
        <p>{{ substr($item->booking_time, 0, 5) }} - {{ $item->customer_name }}</p>
    @empty
        <p>Dnes nemáte žiadne rezervácie.</p>
    @endforelse
        

    </div>
    </div>
    </div>

</x-app-layout>