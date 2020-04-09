@extends('template')

@section('title')
    Create Todos
@endsection

@section('content')
<div class="col-md-8">
    <div class="card card-default">
        <div class="card-header text-center">
            Create New Todos
        </div>

        <div class="card-body">
            <form action="{{ route('todos.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Title" name="title" value="{{ old('title') }}">
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            <strong>
                                {{ $errors->first('title') }}
                            </strong>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <textarea name="details" placeholder="Details" cols="5" rows="5" class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}">{{ old('details') }}</textarea>
                    @if ($errors->has('details'))
                        <div class="invalid-feedback">
                            <strong>
                                {{ $errors->first('details') }}
                            </strong>
                        </div>
                    @endif
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-outline-success">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
