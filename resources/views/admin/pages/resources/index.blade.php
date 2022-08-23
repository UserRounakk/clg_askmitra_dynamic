@extends('admin.admin-panel')

@section('page')
    Resources
@endsection
@section('resources')
    active
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-sm table-bordered table-sripped" id='datatable'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Resource Title</th>
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resources as $resource)
                            <tr>
                                <td>{{ $resource->id }}</td>
                                <td>{{ $resource->title }}</td>
                                <td>{{ $resource->slug }}</td>
                                <td>
                                    <a href="/resources/{{ $resource->slug }}/edit" class="btn btn-outline-warning btn-sm"><i
                                            class="fas fa-edit"></i></a>
                                    <form class='d-inline' action="/resources/{{ $resource->slug }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn-sm btn-outline-danger btn"
                                            onclick="return confirm('Are you sure you want to delete {{ $resource->title }}?')"><i
                                                class="fas fa-trash"></i></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h4 class="heading mt-5">Add new Resource</h4>
                <form action="/resources" method="post" class="d-flex">
                    @csrf
                    <input type="text" name="title" id="title" class="form-control mr-2" placeholder="Title">
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
        </div>
    </div>
@endsection
