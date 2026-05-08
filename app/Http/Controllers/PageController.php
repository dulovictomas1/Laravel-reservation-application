<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Post;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PageController extends Controller
{
    //
    public function about() {   
        return view('about', [
            'title' => 'Toto je head about',
            //'text' => \DB::table('posts')->get()->pluck('text')
            //'text' => Post::all()
        ]);
    }

    /*public function about() {   
        return \DB::table('posts')->get();        
    }*/

    /*public function book($token) {

        $values = User::where('token_UNIQ', $token)->firstOrFail();
        $freetimes = array_map('trim', explode(",", $values->detail->times));

        if(!$values->token_UNIQ) {
            abort(404);
        }

        return view('book', [
            'token' => $values->token_UNIQ,
            'times' => $freetimes,
            'hodnoty' => $values
        ]);
    }*/

    public function index(Request $request) {
        //$details = UserDetail::where('status', 1)->get();

        $query = UserDetail::where('status', 1);

        if($request->tag) {
            $query->where('service_tag', $request->tag);
        }

        $details = $query->get();

        return view('services_list', [
            'details' => $details,
        ]);
    }

    public function show($token)
    {
        $user = User::where('token_UNIQ', $token)->firstOrFail();
        //$freetimes = array_map('trim', explode(",", $user->detail->times));
        $alltimes = array_map('trim', explode(",", $user->detail->times));
        $timesCount = count($alltimes);

        $fullDays = Booking::where('user_id', $user->id)->select('booking_date')->groupBy('booking_date')->havingRaw('COUNT(*) >= ?', [$timesCount])->pluck('booking_date')->toArray();

        $selectedDate = request('date');
        $bookedtimes = [];

        if($selectedDate) {
            $bookedtimes = Booking::where('user_id', $user->id)->where('booking_date', $selectedDate)->pluck('booking_time')->map(fn($time) => substr($time, 0, 5))->toArray();            
        }        

        $free = array_diff($alltimes, $bookedtimes);

        return view('book', [
            'user' => $user,
            'detail' => $user->detail,
            //'times' => $freetimes,
            'free' => $free,
            'selectedDate' => $selectedDate,
            'fulldays' => $fullDays
        ]);
    }

    public function store( Request $request, $token ) {
        //dd($request->all());

        $user = User::where('token_UNIQ', $token)->firstOrFail();

        $validated = $request->validate([
        'customer_name' => ['required', 'string', 'max:255'],
        'customer_email' => ['required', 'email', 'max:255'],
        // dátum musí existovať a nesmie byť starší ako dnes
        'date' => ['required', 'date_format:Y-m-d', 'after_or_equal:today'],
        // čas musí byť vo formáte 09:00
        'time' => ['required', 'date_format:H:i'],
    ]);

        Booking::create([
            'user_id' => $user->id,
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'booking_time' => $validated['time'],
            'booking_date' => $validated['date']
        ]);

        return back()->with('success', [
            'name' => $validated['customer_name'], 
            'email' => $validated['customer_email'], 
            'time' => $validated['time'],
            'date' => Carbon::parse($validated['date'])->format('d.m.Y')]);
    }



    public function home() {

        $home = Post::where('is_home', 1)->firstOrFail();

        return view('home', [
            'home' => $home,            
        ]);
    }



    public function bookshow() {

        $today = Carbon::today()->toDateString();
        $tommrrow = Carbon::tomorrow()->toDateString();

        $bookings = Booking::where('user_id', auth()->id())->whereIn('booking_date', [$today, $tommrrow])->orderBy('booking_date')->orderBy('booking_time')->get()->groupBy('booking_date');

        return view('admin.client-rezervations', [
            'bookings' => $bookings,
            'today' => $today,
            'tommorrow' => $tommrrow,      
        ]);
    }
}

