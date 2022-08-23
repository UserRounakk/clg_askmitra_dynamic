@extends('admin.admin-panel')

@section('page')
    Organizers
@endsection
@section('organizers')
    active
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-sm table-bordered table-sripped" id='datatable'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($organizers as $organizer)
                            <tr>
                                <td class="align-middle">{{ $organizer->id }}</td>
                                <td class="align-middle text-center"><img src="{{ $organizer->image }}" alt="" srcset="" height="100px" width="100px"></td>
                                <td class="align-middle">
                                    <a href="{{ $organizer->url }}" target="_blank" rel="noopener noreferrer">
                                        {{ $organizer->name }}
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <a href="/organizers/{{ $organizer->id }}/edit" class="btn btn-outline-warning btn-sm"><i
                                            class="fas fa-edit"></i></a>
                                    <form class='d-inline' action="/organizers/{{ $organizer->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn-sm btn-outline-danger btn"
                                            onclick="return confirm('Are you sure you want to delete {{ $organizer->title }}?')"><i
                                                class="fas fa-trash"></i></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table><br>
                <a href="/organizers/create" class="btn btn-primary "><i class="fa fa-plus"></i> &nbsp;Add New</a>
                @if (\Session::has('msg'))
                    <br>
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
