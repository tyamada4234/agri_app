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
        $form = $request->except(['genre_id']);

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

        $genre_id = $request['genre_id'];
        $event->genres()->sync($genre_id, false);

        return redirect('user/event');


    }

    public function index(Request $request) 
    {
        $cond_title = $request->cond_title;
        if ($cond_title != null) {
            $posts = Event::where('title', $cond_title)->get();
        } else {
            $posts = Event::all();
        }
        return view('user.event.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }

    public function edit(Request $request)
    {
        $event = Event::find($request->id);
        if (empty($event)) {
            abort(404);
        }

    return view('user.event.edit', ['event_form' => $event]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Event::$rules);
        $event = Event::find($request->id);

        $event_form = $request->all();

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

        $event->fill($event_form)->save();

        return redirect('user/event');
    }

    public function delete(Request $request)
    {
        $event = Event::find($request->id);

        $event->delete();

        return redirect('user/event');

    }
}
