<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Genre;

class EventController extends Controller
{
    public function add()
    {
        $genres = Genre::all();
        
        
        return view('user.event.create', ['genres' => $genres]);
    }

    public function create(Request $request)
    {   
        $this->validate($request, Event::$rules);

        $event = new Event;
        $form = $request->except(['genre_ids']);

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $event->image_path = basename($path);
        } else {
            $event->image_path = null;
        }

        unset($form['_token']);
        unset($form['image']);

        $event->fill($form);
        $event->user_id=Auth::id();
        $event->save();

        $genre_ids = $request['genre_ids'];
        $event->genres()->sync($genre_ids);

        return redirect('user/event');


    }

    public function index(Request $request) 
    {
        $cond_title = $request->cond_title;
        if ($cond_title != null) {
            $events = Event::where('title', $cond_title)->get();
        } else {
            $events = Event::all();
        }
        return view('user.event.index', ['events' => $events, 'cond_title' => $cond_title]);
    }

    public function edit(Request $request)
    {
        $event = Event::find($request->id);
        if (empty($event)) {
            abort(404);
        }

        $genres = Genre::all();

    return view('user.event.edit', ['event_form' => $event, 'genres' => $genres]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Event::$rules);
        $event = Event::find($request->id);

        $event_form = $request->except(['genre_ids']);


        if ($request->remove == 'true') {
            $event_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $event_form['image_path'] = basename($path);
        } else {
            $event_form['image_path'] = $event->image_path;
        }

        unset($event_form['image']);
        unset($event_form['remove']);
        unset($event_form['_token']);

        $event->fill($event_form);
        $event->user_id = Auth::id();
        $event->save();

        $genre_ids = $request['genre_ids'];
        $event->genres()->sync($genre_ids);

        return redirect('user/event');
    }

    public function delete(Request $request)
    {
        $event = Event::find($request->id);

        $genre_ids = $request['genre_ids'];
        //紐づけ解除
        $event->genres()->detach($genre_ids);

        $event->delete();

        return redirect('user/event');

    }
}
