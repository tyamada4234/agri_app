<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Topic;
use App\Models\Genre;

class TopicController extends Controller
{
    public function add()
    {   
        $genres = Genre::all();
        return view('user.topic.create', ['genres' => $genres]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Topic::$rules);

        $topic = new Topic;
        $form = $request->except(['genre_ids']);

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $topic->image_path = basename($path);
        } else {
            $topic->image_path = null;
        }

        unset($form['_token']);
        unset($form['image']);

        $topic->fill($form);
        $topic->user_id = Auth::id();
        $topic->save();

        $genre_ids = $request['genre_ids'];
        $topic->genres()->sync($genre_ids);

        return redirect('user/topic');

    }

    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != null) {
            $topics = Topic::where('title', $cond_title)->get();
        } else {
            $topics = Topic::all();
        }
        return view('user.topic.index', ['topics' => $topics, 'cond_title' => $cond_title]);
    } 
    
    public function edit(Request $request)
    {
        $topic = Topic::find($request->id);
        if (empty($topic)) {
            abort(404);
        }

        $genres = Genre::all();

        return view('user.topic.edit', ['topic_form' => $topic, 'genres' => $genres]);

    }

    public function update(Request $request)
    {
        $this->validate($request, Topic::$rules);
        $topic = Topic::find($request->id);

        $topic_form = $request->except(['genre_ids']);

        if ($request->remove == 'true') {
            $topic_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $topic_form['image_path'] = basename(($path));
        } else {
            $topic_form['image_path'] = $topic->image_path;
        }

        unset($topic_form['image']);
        unset($topic_form['remove']);
        unset($topic_form['_token']);

        $topic->fill($topic_form);
        $topic->user_id = Auth::id();
        $topic->save();

        $genre_ids = $request['genre_ids'];
        $topic->genres()->sync($genre_ids);

        return redirect('user/topic');
    }

    public function delete(Request $request)
    {
        $topic = Topic::find($request->id);
        $genre_ids = $request['genre_ids'];
        $topic->genres()->detach($genre_ids);

        $topic->delete();

        return redirect('user/topic');

    }
    
}
