<div>
    <h1>Questions</h1>
    <ul>
        @foreach ($questions as $question)
            <li>{{ $question->body }}</li>
        @endforeach
    </ul>
    <a href="{{ route('questions') }}">Create a new question</a>
</div>
