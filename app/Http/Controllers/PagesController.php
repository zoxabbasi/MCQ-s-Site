<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Subject;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class PagesController extends Controller
{

    //Controller for website.select-subject
    public function subject()
    {

        //To use the same pages (website.select-subject) for website.prepare and webiste.practice
        $route_name = explode('.', Route::currentRouteName());
        //If the route name has prepare at the end, then create the route for prepare
        if (end($route_name) == 'prepare') {
            $route = 'select.topics.prepare';
            //If the route name has practice at the end, then create the route for practice
        } elseif (end($route_name) == 'practice') {
            $route = 'select.topics.practice';
        }

        return view('website.subjects', [
            'subjects' => Subject::all(),
            'route' => $route
        ]);
    }

    //Controller for website.select-topic
    public function topic(Subject $subject)
    {

        //To use the same pages (website.select-subject) for website.prepare and webiste.practice
        $route_name = explode('.', Route::currentRouteName());
        //If the route name has prepare at the end, then create the route for prepare
        if (end($route_name) == 'prepare') {
            $route = 'prepare';
            //If the route name has practice at the end, then create the route for practice
        } elseif (end($route_name) == 'practice') {
            $route = 'practice';
        }

        return view('website.topics', [
            'topics' => Topic::where('subject_id', $subject->id)->get(),
            'route' => $route
        ]);
    }

    //Controller for website.prepare
    public function prepare(Subject $subject, Topic $topic)
    {
        return view('website.prepare', [
            'questions' => Question::where('topic_id', $topic->id)->get(),
            'subject' => $subject,
        ]);
    }

    //Controller for website.practice
    public function practice(Subject $subject, Topic $topic)
    {
        $total = Question::where('topic_id', $topic->id)->count();
        $question = Question::with('choices')->where('topic_id', $topic->id)->first();
        return view('website.practice', [
            'question' => $question,
            'total' => $total
        ]);
    }
}
