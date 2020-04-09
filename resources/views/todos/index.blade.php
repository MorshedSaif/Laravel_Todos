@extends('template')

@section('title')
    Todos
@endsection

@section('content')
<div class="col-md-8">
    <div class="card card-default">
        <div class="card-header">
            Todos
        </div>

        <div class="card-body">
            <ul class="list-group">
                @foreach($todos as $todo)
                    <li class="list-group-item">
                        {{ $todo->title }}
                        <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-outline-info btn-sm float-right">
                            View
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
