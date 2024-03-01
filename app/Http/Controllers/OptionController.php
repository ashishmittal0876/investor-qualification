<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index(int $questionId): JsonResponse
    {
        $options = Option::query()
            ->where('question_id', $questionId)
            ->get();

        return response()->json($options);
    }
}
