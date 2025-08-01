<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Topic;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Genre;

class EventController extends Controller
{
    public function event_home(Request $request)
    {
        $from = Carbon::today();
        $to= Carbon::today()->addMonths(1);
        $one_month_ago = Carbon::today()->subMonth(1);

       $events = Event::whereBetween('launch_date', [$from, $to])->get();

       $topics = Topic::whereBetween('created_at', [$one_month_ago, $from])->get();

        

    
        return view('event.event_home', ['events' => $events, 'topics' => $topics]);
    }

    public function event_index(Request $request)
    {

        $events = Event::all();

        return view('event.event_index', ['events' => $events]);
    }

    public function event_details(Request $request)
    {
        $event = Event::find($request->id);
        if (empty($event)) {
            abort(404);
        }

    return view('event.event_details', ['event' => $event]);
     }
}
