@extends('template')

@section('title')
    Details - {{ $todo->title }}
@endsection

@section('content')
<div class="col-md-6">
    <div class="card card-default">
        <div class="card-header text-center">
            {{ $todo->title }}
        </div>

        <div class="card-body text-justify">
            {{ $todo->details }}
        </div>

        <div class="my-3 text-center">
            <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-outline-success">
                Edit
            </a>
            <button type="submit" class="btn btn-outline-danger" onclick="deleteTodo({{ $todo->id }})">
                Delete
            </button>
            <form id="delete-form-{{ $todo->id }}" style="display:none;" method="post" action="{{ route('todos.destroy', $todo->id) }}">
                @method('DELETE')
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
