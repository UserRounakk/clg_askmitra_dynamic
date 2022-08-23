@extends('admin.admin-panel')

@section('page')
    Update Resource
@endsection
@section('update_resource')
    active
@endsection

@section('content')
    <div class="col-md-4 ml-5">
        <form action="/resources/{{ $resource->slug }}" method="post">
            @csrf
            @method("put")
            <div class="form-group">
                <label for="title" class="h5">Resource Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $resource->title }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        @if (\Session::has('msg'))
            <br>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if ($errors->any())
        <br>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
@endsection
