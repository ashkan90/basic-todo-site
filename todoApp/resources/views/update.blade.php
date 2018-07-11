@extends('layout')

@section('content')
	 <div class="row">
        <div class="col-md-6 col-lg-6">
            <form action="{{ route('todo.save', ['id' => $todo->id]) }}" method="post">
                {{csrf_field()}}
                <input type="text" name="todo" class="form-control input-lg" placeholder="Update your todo" value="{{ $todo->todo }}">
                
            </form>
        </div>
    </div>
@endsection