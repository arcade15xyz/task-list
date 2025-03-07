@extends('layouts.app')

@section('title',    'The list of tasks!')



@section('content')
    <nav class=" mb-4">
        <a href="{{ route('tasks.create') }}" class='text-gray-700 font-medium underline decoration-pink-700'>Add Task</a>
    </nav>

    {{-- @if (count($tasks)) --}}
        @forelse ($tasks as $task)
            <div>
                <a href="{{route('tasks.show',['task'=> $task->id])}}"
                @class(['font-bold' ,'line-through' => $task->completed])>{{$task->title}}</a>
            </div>


    @empty
        <div>There are no tasks!</div>
        @endforelse
    {{-- @endif --}}

    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection

