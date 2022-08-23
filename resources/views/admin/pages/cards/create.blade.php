@extends('admin.admin-panel')

@section('page')
    Create Card
@endsection
@section('create_card')
    active
@endsection

@section('content')
    <div class="col-md-4 ml-5">
        <form action="/cards" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="h5"> Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="subtitle" class="h5"> Sub Title</label>
                <input type="text" name="subtitle" id="subtitle" class="form-control">
            </div>
            <div class="form-group">
                <label for="url" class="h5"> Redirect URL</label>
                <input type="url" name="url" id="url" class="form-control">
            </div>
            <label for="resource_id" class="h5"> Resource</label>
            <select class="form-control" name="resource_id" id="resource_id" required>
                <option disabled>--Select--</option>
                @foreach ($resources as $resource)
                    <option value="{{ $resource->id }}" resource-id="{{ $resource->id }}">{{ $resource->title }}</option>
                @endforeach
            </select>
            <br>
            <label for="resource_id" class="h5"> Category</label>
            <select class="form-control" name="category_id" id="category_id" required disabled>
                <option disabled>--Select--</option>
            </select>
            <div class="form-check my-4">
                <input class="form-check-input" type="checkbox" value=true id="is_tool" name="is_tool">
                <label class="form-check-label" for="is_tool">
                    Is Tool?
                </label>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Card Image</label>
                <br>
                <img src="" alt="" srcset="" id="preview-image" height=100px width=100px> <br> <br>
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
        let categories = JSON.parse(`<?php echo $categories ?>`);
        document.querySelector("#resource_id").addEventListener("change",resourceValueChanged)
        function resourceValueChanged(e){
            let categoryDropdown = document.getElementById("category_id")
            categoryDropdown.removeAttribute("disabled")
            let filtered_categories = categories.filter(category=>category.resource_id == e.target.value);
            let options = "<option disabled>--Select--</option>";
            filtered_categories.forEach(category => {
                options+=`<option value="${category.id}">${category.title}</option>`
            });
            categoryDropdown.innerHTML = options;
        }
        document.getElementById("image").addEventListener("change",(e)=>{
            document.getElementById("preview-image").src = URL.createObjectURL(e.target.files[0]);
        })
    </script>
@endsection
