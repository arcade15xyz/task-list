@extends('layouts.app')

@section('title',$task->title)


@section('content')

<div class=" mb-4">
    <a href="{{ route('tasks.index') }}" class='link'>← Go back to the task list</a>
</div>

<p class="mb-4 text-slate-700">{{$task->description}}</p>

@if($task->long_description)
    <p>{{$task->long_description}}</p>
@endif

<p class="mb-4 text-sm text-slate-500">Created : {{$task->created_at->diffForHumans()}} · Updated : {{$task->updated_at->diffForHumans()}}</p>

<p class="mb-4">
    @if($task->completed)
        <span class="font-medium text-green-500 border-2 border-green-500 rounded-2xl p-1">Completed</span>
    @else
        <span class="font-medium text-red-500 border-2 border-red-500 rounded-2xl p-1">Not Completed</span>
    @endif
</p>

<div class=" flex gap-2">
    <a href="{{ route('tasks.edit',['task' => $task]) }}" class=" btn">EDIT</a>

    <form action="{{ route('tasks.toggle-complete',['task'=>$task]) }}" method = 'POST'>
        @csrf
        @method('PUT')
        <button type="submit" class="btn">Mark as {{ $task->completed ? 'not completed' : 'completed'}}</button>
    </form>

    <form action="{{ route('tasks.destroy',['task' => $task->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn">DELETE</button>
    </form>
</div>
@endsection

