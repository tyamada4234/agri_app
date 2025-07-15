<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
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

       $events = Event::whereBetween('launch_date', [$from, $to])->get();

        if (count($events) > 0) {
            $headline = $events->shift();
        } else {
            $headline = null;
        }

    
        return view('event.event_home', ['headline' => $headline, 'events' => $events]);
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

        $genres = Genre::all();
        
    return view('event.event_details', ['event' => $event, 'genres' => $genres]);
     }
}
