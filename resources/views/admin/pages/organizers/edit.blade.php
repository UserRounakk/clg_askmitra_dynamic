@extends('admin.admin-panel')

@section('page')
    Edit Organizer
@endsection
@section('edit_organizer')
    active
@endsection

@section('content')
    <div class="col-md-4 ml-5">
        <form action="/organizers/{{ $organizer->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="form-group">
                <label for="title" class="h5"> Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $organizer->name }}">
            </div>
            <div class="form-group">
                <label for="url" class="h5"> Redirect URL</label>
                <input type="url" name="url" id="url" class="form-control" value="{{ $organizer->url }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Organizer Logo</label>
                <br>
                <img src="/{{ $organizer->image }}" alt="" srcset="" id="preview-image" height=100px width=100px> <br> <br>
                <input class="" type="file" id="image" name="image">
            </div>
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
        <script>
            document.getElementById("image").addEventListener("change",(e)=>{
            document.getElementById("preview-image").src = URL.createObjectURL(e.target.files[0]);
        })
        </script>
@endsection
