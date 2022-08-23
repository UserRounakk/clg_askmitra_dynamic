@extends('admin.admin-panel')

@section('page')
    Cards
@endsection
@section('cards')
    active
@endsection

@section('content')
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-sm table-bordered table-sripped" id='datatable'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Resource</th>
                            <th>Category</th>
                            <th>Is Tool?</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cards as $card)
                            <tr>
                                <td class="align-middle">{{ $card->id }}</td>
                                <td class="align-middle text-center"><img src="{{ $card->image }}" alt="" srcset="" height="100px" width="100px"></td>
                                <td class="align-middle">{{ $card->title }}</td>
                                <td class="align-middle">{{ $card->subtitle }}</td>
                                <td class="align-middle">
                                    @foreach ($resources as $resource)
                                        @if ( $resource->id == $card->resource_id )
                                            {{ $resource->title }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="align-middle">
                                    @foreach ($categories as $category)
                                        @if ( $category->id == $card->category_id )
                                            {{ $category->title }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="align-middle">{{ $card->is_tool ? "Yes" : "No" }}</td>
                                <td class="align-middle">
                                    <a href="/cards/{{ $card->id }}/edit" class="btn btn-outline-warning btn-sm"><i
                                            class="fas fa-edit"></i></a>
                                    <form class='d-inline' action="/cards/{{ $card->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn-sm btn-outline-danger btn"
                                            onclick="return confirm('Are you sure you want to delete {{ $card->title }}?')"><i
                                                class="fas fa-trash"></i></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table><br>
                <a href="/cards/create" class="btn btn-primary "><i class="fa fa-plus"></i> &nbsp;Add New</a>
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
