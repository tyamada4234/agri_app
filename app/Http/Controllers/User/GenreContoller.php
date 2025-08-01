<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenreContoller extends Controller
{
    //
    public function add()
    {
        return view('user.genre.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Genre::$rules);

        $genre = new Genre;
        $form = $request->all();

        unset($form['_token']);

        $genre->fill($form);
        $genre->user_id=Auth::id();
        $genre->save();

        return redirect('user/genre');
    }

    public function index(Request $request)
    {
        $cond_name = $request->cond_name;
        if ($cond_name != null) {
            $genres = Genre::where('name', $cond_name)->get();
        } else {
            $genres = Genre::all();
        }
        return view('user.genre.index', ['genres' => $genres, 'cond_name' => $cond_name]);

    }

    public function edit(Request $request)
    {
        $genre = Genre::find($request->id);
        if (empty($genre)) {
            abort(404);
        }
        return view('user.genre.edit', ['genre_form' => $genre]);
    }

    public function update(Request $request)

    {
        $this->validate($request, Genre::$rules);

        $genre = Genre::find($request->id);

        $genre_form = $request->all();
        unset($genre_form['_token']);

        $genre->fill($genre_form)->save();

        return redirect('user/genre');
    }

    public function delete(Request $request)
    {
        $genre = Genre::find($request->id);
        $genre->delete();

        return redirect('user/genre');
    }


}
