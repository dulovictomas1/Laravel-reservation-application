@extends('layouts.book-layout')

@section('content')

<h3 class="heading-h3" style="color: white"><strong>Rezervovať si termín u {{ $detail->job_name }}</strong></h3>

<form action="{{ route('book.show', $user->token_UNIQ) }}" method="get" class="check_times">
    @csrf

    <div class="form_block">
        <label>Vyberte si termín (rezerváciu je možné vykonať len na dni dopredu)</label>
        <input type="date" name="date" id="date-pick" value="{{ $selectedDate }}">
    </div>

    <div class="flex items-center gap-4">
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Overiť časy</button>
    </div>
</form>

@if ($selectedDate)
    <form method="POST" action="{{ route('book.store', $user->token_UNIQ) }}" class="form_booking">
        @csrf
        <div class="form_block">            
            <input hidden type="date" name="date" value="{{ $selectedDate }}">

            @error('date')
                <p class="text-red-500">{{ $message }}</p>
            @enderror

        </div>

        <div class="form_block">
            <label>Čas</label>
            <select name="time" id="time">
                @foreach ($free as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>

            @error('time')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="form_block">
            <label>Vaše meno a priezvisko</label>
            <input type="text" name="customer_name" id="customer_name" placeholder="Janko Hráško">
        </div>

        <div class="form_block">
            <label>Váš e-mail</label>
            <input type="email" name="customer_email" id="customer_email" placeholder="vas@email.sk">
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Odoslať rezerváciu</button>
        </div>
    </form>
    @endif

    @if (session('success'))
    <div class="wrap">
        <div class="suuces_msg">
            <p class="text-green-600">Vaša rezervácia prebehla úspešne.</p>
                <p><strong>Detail:</strong></p>
                <p>Meno: {{ session('success.name') }}</p>
                <p>E-mail: {{ session('success.email') }}</p>
                <p>Dátum: {{ session('success.date') }}</p>
                <p>Čas: {{ session('success.time') }}</p>

                <button class="btn_close_secess">Zavrieť</button>
        </div>
    </div>
    @endif



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/sk.js"></script>
<script>
const fullDates = @json($fulldays);
</script>


<script>
flatpickr("#date-pick", {
    locale: "sk",
    dateFormat: "Y-m-d",
    altInput: true,
    altFormat: "d.m.Y",
    allowInput: false,
    minDate: new Date().fp_incr(1),
    disable: fullDates,
    onDayCreate: function(dObj, dStr, fp, dayElem) {
            const date = dayElem.dateObj.getFullYear() + '-' +
                String(dayElem.dateObj.getMonth() + 1).padStart(2, '0') + '-' +
                String(dayElem.dateObj.getDate()).padStart(2, '0');

            if (fullDates.includes(date)) {
                dayElem.classList.add("full-day");
            }
        }
    });


</script>   

@endsection




