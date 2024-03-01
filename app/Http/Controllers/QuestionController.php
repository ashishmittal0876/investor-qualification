<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\JsonResponse;

class QuestionController extends Controller
{
    public function index(): JsonResponse
    {
        $questions = Question::query()->get();
        return response()->json($questions);
    }

    public function show(int $id): JsonResponse
    {
        $question = Question::query()->find($id)->load('options');
        return response()->json($question);
    }
}
