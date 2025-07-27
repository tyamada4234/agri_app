<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Topic;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Genre;

class TopicController extends Controller
{
    public function topic_index(Request $request)
    {

        $topics = Topic::all();

        return view('topic.topic_index', ['topics' => $topics]);
    }

    public function topic_details(Request $request)
    {
        $topic = Topic::find($request->id);
        if (empty($topic)) {
            abort(404);
        }

    return view('topic.topic_details', ['topic' => $topic]);
     }

}
