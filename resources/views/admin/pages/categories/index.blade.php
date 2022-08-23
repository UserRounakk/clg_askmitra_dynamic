@extends('admin.admin-panel')

@section('page')
    Categories
@endsection
@section('categories')
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
                            <th>Title</th>
                            <th>Resource</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->resource }}</td>
                                <td>
                                    <a href="/categories/{{ $category->id }}/edit" class="btn btn-outline-warning btn-sm"><i
                                            class="fas fa-edit"></i></a>
                                    <form class='d-inline' action="/categories/{{ $category->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn-sm btn-outline-danger btn"
                                            onclick="return confirm('Are you sure you want to delete {{ $category->title }}?')"><i
                                                class="fas fa-trash"></i></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table><br>
                <a href="/categories/create" class="btn btn-primary "><i class="fa fa-plus"></i> &nbsp;Add New</a>
                @if (\Session::has('msg'))
                    <br>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('msg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
