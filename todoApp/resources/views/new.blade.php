@extends('layout')

@section('title')
    My Todo List
@endsection

@section('content')

    <div class="row">

        <div class="col-md-6 col-lg-6">
            <form action="create/todo" method="post">
                {{csrf_field()}}
                <input type="text" name="todo" class="form-control input-lg" placeholder="Create a new todo">
                
            </form>
        </div>
    </div>
    <hr>

    @foreach($todos as $todo)
        {{ $todo->todo }} <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger"> x </a>
         <a href="{{ route('todo.update', ['id' => $todo->id]) }}" class="btn btn-primary btn-xs"> update </a>
         @if(!$todo->completed)
            <a href="{{ route('todo.completed', ['id' => $todo->id]) }}" class="btn btn-xs btn-success">Mark as completed</a>
         @else
            Completed !
        @endif
        <hr>
    @endforeach

    

@stop