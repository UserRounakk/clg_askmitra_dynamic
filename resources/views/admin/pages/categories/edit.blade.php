@extends('admin.admin-panel')

@section('page')
    Update Category
@endsection
@section('create_category')
    active
@endsection

@section('content')
    <div class="col-md-4 ml-5">
        <form action="/categories/{{ $category->id }}" method="post">
            @csrf
            @method("put")
            <div class="form-group">
                <label for="title" class="h5"> Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $category->title }}">
            </div>
            <label for="resource_id" class="h5"> Resouce</label>
            <select class="form-control" name="resource_id" id="resource_id" required>
                <option disabled>--Select--</option>
                @foreach ($resources as $resource)
                    <option value="{{ $resource->id }}" {{ $resource->id == $category->resource_id ? "selected" : '' }}>{{ $resource->title }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary mt-2">Save</button>
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
