<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.topics.index', ['topics' => Topic::with('subject')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.topics.create', ['subjects' => Subject::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => ['required'],
            'name' => ['required'],
        ]);

        $data = [
            'subject_id' => $request->subject,
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name)
        ];


        return Topic::create($data) ? redirect(route('admin.topics'))->with('message', 'Topic successfuly created') : redirect(route('admin.topics'))->with('message', 'Something went wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        return view('admin.topics.edit', [
            'topic' => $topic,
            'subjects' => Subject::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        //
    }
}
