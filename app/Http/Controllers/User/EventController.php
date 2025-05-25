<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function add()
    {
        return view('user.event.create');
    }

    public function create(Request $request)
    {   
        $this->validate($request, Event::$rules);

        $event = new Event;
        $form = $request->all();

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $event->image_path = basename($path);
        } else {
            $event->image_path = null;
        }

        unset($form['_token']);
        unset($form['image']);

        $event->fill($form);
        $event->save();

        return redirect('user/event/create');

    }
}
