<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Choice;
use App\Models\Question;
use Illuminate\Http\Request;

class DynamicController extends Controller
{
    public function fetch_topics()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $topics = Topic::where('subject_id', $data['subjectId'])->get();
        if (count($topics) > 0) {
            $output = '<option>Select the topic</option>';
            foreach ($topics as $topic) {
                $output .= '<option value="' . $topic->id . '">' . $topic->name . '</option>';
            }
        } else {
            $output = '<option value="">No Topic Found!</option>';
        }
        echo json_encode($output);
    }

    public function fetch_topics_questions()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $topics = Topic::where('subject_id', $data['subjectId'])->get();
        if (count($topics) > 0) {
            $output = '<option>Select the topic</option>';
            foreach ($topics as $topic) {
                $output .= '<option value="' . $topic->id . '">' . $topic->name . '</option>';
            }
        } else {
            $output = '<option value="">No Topic Found!</option>';
        }
        echo json_encode($output);
    }

    public function fetch_topics_questions_all()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $questions = Question::where('topic_id', $data['topicId'])->get();
        if (count($questions) > 0) {
            $output = '<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 my-5"><div class="flex flex-col justify-between p-4 leading-normal">';
            foreach ($questions as $question) {
                $output .=
                    '<p class="my-10 mb-3 font-normal text-gray-700 dark:text-gray-400"></p><h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Question: ' . $question->text . '</h5><a href="' . route('admin.question.edit', $question) . '" class="button small green"><span class="icon"><i class="mdi mdi-eye"></i></span></a><button class="button small red --jb-modal" data-target="sample-modal"type="button"><span class="icon"><i class="mdi mdi-trash-can"></i></span></button>';

                '<ol>';
                foreach ($question->choices as $choice) {
                    $output .= '<li class="mb-3 font-normal text-gray-700 dark:text-gray-400">' . $choice->text . '</li>';
                }
                '</ol>';
            }
            '</div></div><br>';
        } else {
            $output = '<div>Nothing to display</div>';
        }
        echo json_encode($output);
    }

    public function fetch_topics_all()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $topics = Topic::where('subject_id', $data['subjectId'])->get();
        if (count($topics) > 0) {
            $output = '<table><thead><tr><th>Name</th><th>Description</th><th>Number of questions</th><th>Slug</th><th>Action</th></tr></thead><tbody>';
            foreach ($topics as $topic) {
                $output .= '<tr><td data-label="Name">' .  $topic->name . '</td><td data-label="Description">' . $topic->description . '</td><td data-label="Number">' . count($topic->questions) . '</td><td data-label="Slug">' . $topic->slug . '</td><td class="actions-cell"><div class="buttons right nowrap"><a href="' . route('admin.topic.edit', $topic) . '" class="button small green"><span class="icon"><i class="mdi mdi-eye"></i></span></a><button class="button small red --jb-modal" data-target="sample-modal"type="button"><span class="icon"><i class="mdi mdi-trash-can"></i></span></button></div></td></tr>';
            }
            '</tbody></table>';
        } else {
            $output = '<div>Nothing to display</div>';
        }
        echo json_encode($output);
    }

    public function check_question() {
        $data = json_decode(file_get_contents('php://input'), true);
        $is_correct = Choice::where([
            ['id', $data['choice_id']],
            ['is_correct', 1],
        ])->first();

        if ($is_correct) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }
}
