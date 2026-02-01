<?php

namespace App\Http\Controllers;
use App\Models\Score;

use Illuminate\Http\Request;


class ScoreController extends Controller
{
    public function scores()
    {
        $scores=Score::all();
        return view("/welcome", compact('scores'));
    }

    public function add_new_score(Request $request)
    {
        $request->validate(
            [
                "school_class" => "string|min:3|max:255|required",
                "score" => "integer|required|min:0|max:100",
                "teacher" => "string|required",
            ]
        );

        Score::create(
            [
                "school_class" => $request->get("school_class"),
                "score" => $request->get('score'),
                "teacher" => $request->get('teacher')
            ]
        );

        return redirect("/");
    }
}
